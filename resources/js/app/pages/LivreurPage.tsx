import React from "react";
import { useState } from "react";
import LivreurProfile from "../Components/LivreurProfile";
import { useEffect } from "react";

export default function LivreurPage(){
    const [livreurs, setLivreur] = useState([
        {
            name: "Patrick",
            id:0,
            price: 89.99,
            prix_par_valeur:0.23

        },
        {
            name: "Maria",
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
    useEffect(()=>{
           fetch("/livreur/home")
           .then(e=>e.json())
           .then((e)=>{
            const data = e.map((d)=>{
                 d.user = d.user.name
                 return d
            });
            setLivreur(data)
           })
           .catch((e)=>{
               console.log(e)
           })
    }, [])

    return <div>
        <div className="px-3 pt-3">
        <a   href="/livreur"

                        className='text-gray-300 bg-gray-800 hover:text-white rounded-md px-3 py-2 text-sm font-medium'



                      >


                        Devenir livreur
                      </a>
        </div>

            <div className="grid grid-cols-4 gap-2 px-2 pt-3 pb-3">
                    {livreurs.map((livreur) => (
                    <LivreurProfile key={livreur.id} {...livreur}></LivreurProfile>
                        ))}
            </div>



            </div>
}