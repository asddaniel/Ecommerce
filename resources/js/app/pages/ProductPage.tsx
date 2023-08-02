import React, { useState, Component, ReactNode } from "react";
import { Location, Link } from "react-router-dom";
import soulier from "../../images/soulier.jpg";
import Swal from 'sweetalert2';
import userimage from "../../images/user.png";

type Props = {

}


export default class ProductPage extends Component{
    constructor(props: any){
        super(props)
        this.state = {
            products: [],
            comments: [] // Ajout du tableau de commentaires
        }
        this.handleCommentClick = this.handleCommentClick.bind(this); // Liaison du contexte pour la fonction de gestionnaire d'événements
    }

    componentDidMount(): void {
        const id = location.pathname.split("/")[2];
        console.log(id);
        fetch(location.pathname.split("/")[0]+"/api/produits/"+id)
            .then(res => res.json())
            .then(data => {
                console.log(data);

                this.setState({
                    products: data,
                    comments: Array.from(data.commentaires.map(comment => {
                        const com = comment
                        com.user = comment.user.name
                        return com
                    }))
                });
            })
            .catch(err => {
                console.log(err);
                console.error(err);
            });
    }

    // Fonction de gestionnaire d'événements pour le clic sur le bouton "commenter"
    handleCommentClick() {
        // Afficher une boîte de dialogue SweetAlert2 pour permettre à l'utilisateur d'entrer son commentaire
        Swal.fire({
            title: 'Ajouter un commentaire',
            input: 'text',
            inputPlaceholder: 'Entrez votre commentaire ici...',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Ajouter',
            cancelButtonText: 'Annuler',
            showLoaderOnConfirm: true,
            preConfirm: (comment) => {
                // Ajouter le commentaire entré par l'utilisateur au tableau de commentaires dans le state


                const formulaire = new FormData();
                formulaire.append("commentaire", comment);

                formulaire.append("_token", document.form_uri._token.value.trim());
                formulaire.append("produit_id", this.state.products.id);
                formulaire.append("commentaire", comment);
                    console.log(formulaire.get("commentaire"));
                fetch(location.pathname.split("/")[0]+"/commentaires", {
                    method: 'POST',

                    body: formulaire
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    const newData =data.commentaire
                    newData.user = data.user.name
                    const newComments = [...this.state.comments];
                newComments.push(newData);
                this.setState({ comments: newComments });
                })
                .catch(err => {
                    console.log(err);
                })


            },
            allowOutsideClick: () => !Swal.isLoading()
        });
    }

    render():ReactNode{
        return <div>
            <section className="dark:bg-gray-800 dark:text-gray-100">
                <div className="container px-6 py-10 mx-auto">
                    <div className="grid  gap-4 xl:grid-cols-6 ">
                        <div className="max-w-2xl mx-auto my-5 mt-0 space-y-4 top-0 text-center xl:col-span-2 xl:text-left ">
                            <h2 className="text-4xl font-bold">{this.state.products.name}</h2>
                            <div className="flex">
                                {/* Ajout d'un gestionnaire d'événements pour le clic sur le bouton "commenter" */}
                                <button className="btn" onClick={this.handleCommentClick}>commenter</button>
                            </div>
                            <img src={location.pathname.split("/")[0]+"/storage/images/"+this.state.products.image} alt="" className="mx-auto max-h-96" />
                            <p className="dark:text-gray-400">{this.state.products.description}</p>
                            <h2>${this.state.products.price}</h2>
                        </div>
                        <div className="p-6 xl:col-span-4 ">
                            <div className="grid gap-4 ">
                                <div className="grid  content-center gap-4 xl:grid-cols-4 ">
                                    {/* Utilisation de la méthode map() pour afficher les commentaires stockés dans le state */}
                                    {this.state.comments.map((comment, index) => (
                                        <div key={index} className="p-6 rounded shadow-md dark:bg-gray-900 xl:col-span-2">
                                            <p>{comment.commentaire}</p>
                                            <div className="flex items-center mt-4 space-x-4">
                                                <img src={userimage} alt="" className="w-12 h-12 bg-center bg-cover rounded-full dark:bg-gray-500" />
                                                <div>
                                                    <p className="text-lg font-semibold">{comment.user}</p>
                                                    <p className="text-sm dark:text-gray-400">Lubumbashi</p>
                                                </div>
                                            </div>
                                        </div>
                                    ))}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    }
}