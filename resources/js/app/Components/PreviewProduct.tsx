import React, { useState } from "react";
import soulier from "../../images/soulier.jpg";
import Swal, { SweetAlertResult } from 'sweetalert2';
import { Link } from "react-router-dom";

type Categorie = {
    name: string;
}

type Produit = {
    id: number;
    name: string;
    description: string;
    image: string;
    link_image: string;
    price: number;
    categorie: Categorie;
}
interface Document{
    form_uri: HTMLFormElement
}
interface document{
    form_uri: HTMLFormElement
}

interface Props {
    nom: string;
    categorie: Categorie;
    prix: number;
}

export default function PreviewProduct(props: Produit) {
    const [quantity, setQuantity] = useState(1);

    const cartItems = JSON.parse(localStorage.getItem('cartItems') || '[]');
    const existingItem = cartItems.find((item: Produit) => item.id === props.id);
     const persistVente = async function( resolve:any)  {
         const response = await fetch(location.pathname.split("/")[0]+"/ventes/create")
         .then(res => res.json())
         .then(data => {
             localStorage.setItem('vente_id', data.id)
             const ligne  = resolve()
             return {data:data, ligne: ligne}
         })
         .catch(err => {
             console.log(err)
             return null
         })
         return response
     }
    const addToCart = async () => {
        if (existingItem) {
            Swal.fire({
                title: 'Modifier la quantité',
                input: 'number',
                inputValue: existingItem.quantity,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Veuillez entrer une quantité';
                    }
                    if (isNaN(Number(value))) {
                        return 'Veuillez entrer un nombre';
                    }
                    if (Number(value) < 1) {
                        return 'Veuillez entrer une quantité valide';
                    }
                    const formulaire = new FormData();
                    formulaire.append("produit_id", props.id);
                    formulaire.append("vente_id", localStorage.getItem('vente_id'));
                    formulaire.append("quantite", value);
                    formulaire.append("_token",document.form_uri?._token.value);
                    fetch(location.pathname.split("/")[0]+"/ventes/ligne/update/" + existingItem.ligne_id, {
                        method: 'POST',
                        body: formulaire,
                    }).then(res => res.text()).then(data => {
                        console.log(data)
                    })
                    .catch(err => {
                        console.log(err)
                    })

                    existingItem.quantity = Number(value);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    Swal.fire({
                        title: 'Quantité modifiée',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        } else {
            Swal.fire({
                title: 'Quantité',
                input: 'number',
                inputValue: quantity,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Veuillez entrer une quantité';
                    }
                    if (isNaN(Number(value))) {
                        return 'Veuillez entrer un nombre';
                    }
                    if (Number(value) < 1) {
                        return 'Veuillez entrer une quantité valide';
                    }

                    if(!localStorage.getItem('vente_id')){
                        const execresolve = async() => {
                            const formd = new FormData();
                    formd.append("produit_id", props.id);
                    formd.append("quantite", value);
                    formd.append("vente_id", localStorage.getItem('vente_id'));
                    formd.append("_token",document.form_uri?._token.value)
                    fetch(location.pathname.split("/")[0]+"/ventes/ligne", {
                        method: 'POST',

                        body: formd
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data)
                    })
                    .catch(err => {
                        console.log(err)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'vous n etes pas connecté'
                        })
                        return
                    })
                        }
                        const addVente =  persistVente(execresolve)
                        if(!addVente){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Une erreur est survenue'
                            })
                            return
                        }
           console.log(addVente)
                        const newCartItem = { ...props, quantity: Number(value), ligne_id: addVente.ligne.id };
                        cartItems.push(newCartItem);
                        localStorage.setItem('cartItems', JSON.stringify(cartItems));
                        Swal.fire({
                            title: 'Produit ajouté au panier',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }else{
                        const formd = new FormData();
                    formd.append("produit_id", props.id.toString());
                    formd.append("quantite", value);
                    formd.append("vente_id", localStorage.getItem('vente_id'));
                    formd.append("_token", Document.form_uri?._token.value)
                    fetch(location.pathname.split("/")[0]+"/ventes/ligne", {
                        method: 'POST',

                        body: formd
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data)
                        const newCartItem = { ...props, quantity: Number(value), ligne_id: data.id };
                        cartItems.push(newCartItem);
                        localStorage.setItem('cartItems', JSON.stringify(cartItems));
                        Swal.fire({
                            title: 'Produit ajouté au panier',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(err => {
                        console.log(err)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'vous n etes pas connecté'
                        })
                        return
                    })



                    }



                }
            });
        }
    }

    const buttonText = existingItem ? "Modifier quantité" : "Ajouter au panier";
    const buttonColor = existingItem ? "bg-yellow-500 hover:bg-yellow-600" : "bg-white hover:bg-gray-200";

    return (
        <div className="pt-2 px-3">
            <div className="max-w-xs overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div className="px-4 py-2">
                    <h1 className="text-xl font-bold text-gray-800 uppercase dark:text-white">{props.name}</h1>
                    <p className="mt-1 text-sm text-gray-600 dark:text-gray-400">{props.description.substring(0, 100)}</p>
                </div>

                <img className="object-cover w-full h-48 mt-2" src={props.link_image} alt={props.name}/>

                <div className="flex items-center justify-between px-4 py-2 bg-gray-900">
                    <h1 className="text-lg font-bold text-white">${props.price}</h1>
                    <button
                        className={`px-2 py-1 text-xs font-semibold text-gray-900 uppercase transition-colors duration-300 transform rounded focus:outline-none ${buttonColor}`}
                        onClick={() => addToCart()}
                    >
                        {buttonText}
                    </button>
                    <Link to={"/produit/" + props.id + "/"} className="px-2 py-1 text-xs font-semibold text-gray-900 uppercase transition-colors duration-300 transform bg-white rounded hover:bg-gray-200 focus:bg-gray-400 focus:outline-none" >voir</Link>
                </div>
            </div>
        </div>
    );
}