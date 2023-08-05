import React from 'react';
import Swal from 'sweetalert2';
import mastercard from "../../images/mastercard-48.png"
import { useEffect, useState } from 'react';


const Payement = () => {

    const [total, setTotal] = useState(0);
    useEffect(() => {
        const cart: [] = JSON.parse(localStorage.getItem("cartItems")??'[]');


        let totale: number = 0

        for(let i=0;i<cart.length;i++){
            totale += cart[i].price*cart[i].quantity
        }

        console.log(totale)

        setTotal(totale);
    }, [])
    const handleClick = () => {
        Swal.fire({
            title: 'Confirmer le payement ?',
            text: 'Êtes-vous sûr de vouloir proceder au payement ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui',
            cancelButtonText: 'Annuler',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'succée !',
                    'payement effectué.',
                    'success'
                );
            }
        });
    };

    return (
        <div className='flex justify-center pt-3 pb-5 '>
            <div className="w-full max-w-xs p-6 overflow-hidden bg-white shadow-lg rounded-xl dark:bg-gray-800">
            <div className="flex items-center justify-between p-2 my-6 bg-blue-100 rounded">
                <div className="flex items-start justify-between w-full">
                    <p className="flex-grow w-full text-2xl text-gray-700">
                        <span className="font-light text-gray-400 text-md">
                            $
                        </span>
                        {total}
                        <span className="text-sm font-light text-gray-400">
                           Mastercard
                        </span>
                    </p>
                    <span className='flex-none px-3 py-1 text-sm text-indigo-500 border border-indigo-500 rounded-full'>
                        <input type="radio" name="payment" id="" className='p-2' checked />
                    </span>
                    <span className="flex-none px-3 py-1 text-sm text-indigo-500 border border-indigo-500 rounded-full">
                        <img src={mastercard} alt="mastercard" className="h-8 w-8" />
                    </span>
                </div>
            </div>

            <div className="flex items-center justify-between p-2 my-6 bg-blue-100 rounded">
                <div className="flex items-start justify-between w-full">
                    <p className="flex-grow w-full text-2xl text-gray-700">
                        <span className="font-light text-gray-400 text-md">
                            $
                        </span>
                        {total}
                        <span className="text-sm font-light text-gray-400">

                        </span>
                    </p>
                    <span className='flex-none px-3 py-1 text-sm text-indigo-500 border border-indigo-500 rounded-full'>
                        <input type="radio" name="payment" id="" className='p-2' />
                    </span>
                    <span className="flex-none px-3 py-1 text-sm text-indigo-500 border border-indigo-500 rounded-full">
                        Mobile money
                    </span>
                </div>
            </div>
            <button type="button" className="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg " onClick={handleClick}>
                Payer
            </button>
        </div>
        </div>

    );
};

export default Payement;