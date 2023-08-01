import React, { useState, Component, ReactNode } from "react";
import { Location, Link } from "react-router-dom";
import soulier from "../../images/soulier.jpg";
import Swal from 'sweetalert2';

export default class ProductPage extends Component{
    constructor(props){
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
                    products: data.data
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
                const newComments = [...this.state.comments];
                newComments.push(comment);
                this.setState({ comments: newComments });
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
    }

    render():ReactNode{
        return <div>
            <section className="dark:bg-gray-800 dark:text-gray-100">
                <div className="container px-6 py-10 mx-auto">
                    <div className="grid  gap-4 xl:grid-cols-5 ">
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
                        <div className="p-6 xl:col-span-3">
                            <div className="grid gap-4 md:grid-cols-2">
                                <div className="grid content-center gap-4">
                                    {/* Utilisation de la méthode map() pour afficher les commentaires stockés dans le state */}
                                    {this.state.comments.map((comment, index) => (
                                        <div key={index} className="p-6 rounded shadow-md dark:bg-gray-900">
                                            <p>{comment}</p>
                                            <div className="flex items-center mt-4 space-x-4">
                                                <img src="https://source.unsplash.com/50x50/?portrait?1" alt="" className="w-12 h-12 bg-center bg-cover rounded-full dark:bg-gray-500" />
                                                <div>
                                                    <p className="text-lg font-semibold">Leroy Jenkins</p>
                                                    <p className="text-sm dark:text-gray-400">CTO of Company Co.</p>
                                                </div>
                                            </div>
                                        </div>
                                    ))}
                                </div>
                                <div className="grid content-center gap-4">
                                    <div className="p-6 rounded shadow-md dark:bg-gray-900">
                                        <p>An audire commodo habemus cum. Ne sed corrumpit repudiandae. Tota aliquip democritum pro in, nec democritum intellegam ne. Propriae volutpat dissentiet ea sit, nec at lorem inani tritani, an ius populo perfecto vituperatum. Ei vix purto harum consetetur, et vis ludus dicam. Ex saepe laoreet qui, no nec errem vivendum. Cum inani iriure an, ei vis iudico putant accumsan, his eu iudico vulputate.</p>
                                        <div className="flex items-center mt-4 space-x-4">
                                            <img src="https://source.unsplash.com/50x50/?portrait?2" alt="" className="w-12 h-12 bg-center bg-cover rounded-full dark:bg-gray-500" />
                                            <div>
                                                <p className="text-lg font-semibold">Jane Doe</p>
                                                <p className="text-sm dark:text-gray-400">CEO of Company Co.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="p-6 rounded shadow-md dark:bg-gray-900">
                                        <p>At ius quem veri omnesque, vis et dicta postulant, ei has errem eleifend expetendis. Ad eius persius qui, id eum facete iuvaret, vel adhuc deseruisse at. At per vero docendi, mei quodsi iriure ei, nec ullum putent recusabo ei. Ex quo modus meliore facilisis, suscipit voluptatum ne pri, ut sea doctus facilisis definiebas.</p>
                                        <div className="flex items-center mt-4 space-x-4">
                                            <img src="https://source.unsplash.com/50x50/?portrait?3" alt="" className="w-12 h-12 bg-center bg-cover rounded-full dark:bg-gray-500" />
                                            <div>
                                                <p className="text-lg font-semibold">John Smith</p>
                                                <p className="text-sm dark:text-gray-400">COO of Company Co.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    }
}