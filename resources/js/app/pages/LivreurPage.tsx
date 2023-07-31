import React from "react";
import { useState } from "react";
import LivreurProfile from "../Components/LivreurProfile";


export default function LivreurPage(){
    const [livreurs, setLivreur] = useState([
        {
            name: "Ahmed",
            id:0,
            price: 89.99,
            prix_par_valeur:0.23

        },
        {
            name: "Achile",
            id: 1,
            price: 289.99,
            prix_par_valeur:0.33

        },
        {
            name: "Marco",
            id: 2,
            price: 523.99,
            prix_par_valeur:0.35

        },


    ])

    return <div className="grid grid-cols-4 gap-2 px-2 pt-3 pb-3">

       {livreurs.map((livreur) => (
           <LivreurProfile key={livreur.id} {...livreur}></LivreurProfile>
       ))}

            </div>
}