import React, { Component, ReactNode } from "react";
import CardProduct from "./CardProduct";
type etat= {
    products:any[]
}

export default class Shopping extends Component{

    constructor(props:etat){
        super(props)
        this.state= {
            products: [
                {
                    name: "Polaroid Camera",
                    id:0,
                    price: 59.99,
                    categorie: {
                        id: 1,
                        name: "Camera"
                    }
                },
                {
                    name: "Atelier bizantine",
                    id:2,
                    price: 59.99,
                    categorie: {
                        id: 1,
                        name: "Appareil Photo"
                    }
                }
            ]
        }
    }

    render():ReactNode{
            return <div className=" w-full">
                <div className="flex flex-col max-w-3xl p-6 space-y-4 sm:p-10 ">
	<h2 className="text-xl font-semibold">Your cart</h2>
	<ul className="flex flex-col divide-y divide-gray-700">
          {this.state?.products?.map((product) => (
            <CardProduct key={product.id} {...product} />
          ))}
	</ul>
	<div className="space-y-1 text-right">
		<p>Total amount:
			<span className="font-semibold">{this.state?.products?.reduce((total, product) => total + product.price, 0)} €</span>
		</p>
		<p className="text-sm dark:text-gray-400">Not including taxes and shipping costs</p>
	</div>
    <div className="flex justify-end ">
    <nav aria-label="Pagination" className="inline-flex -space-x-px rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-100">
	<button type="button" className="inline-flex items-center px-2 py-2 text-sm font-semibold border rounded-l-md dark:border-gray-700">
		<span className="sr-only">Previous</span>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" className="w-5 h-5">
			<path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd"></path>
		</svg>
	</button>
	<button type="button" aria-current="page" className="inline-flex items-center px-4 py-2 text-sm font-semibold border dark:bg-violet-400 dark:text-gray-900 dark:border-gray-700">1</button>
	<button type="button" className="inline-flex items-center px-4 py-2 text-sm font-semibold border dark:border-gray-700">2</button>
	<button type="button" className="inline-flex items-center px-4 py-2 text-sm font-semibold border dark:border-gray-700">3</button>
	<button type="button" className="inline-flex items-center px-4 py-2 text-sm font-semibold border dark:border-gray-700">...</button>
	<button type="button" className="inline-flex items-center px-4 py-2 text-sm font-semibold border dark:border-gray-700">7</button>
	<button type="button" className="inline-flex items-center px-4 py-2 text-sm font-semibold border dark:border-gray-700">8</button>
	<button type="button" className="inline-flex items-center px-4 py-2 text-sm font-semibold border dark:border-gray-700">9</button>
	<button type="button" className="inline-flex items-center px-2 py-2 text-sm font-semibold border rounded-r-md dark:border-gray-700">
		<span className="sr-only">Next</span>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" className="w-5 h-5">
			<path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path>
		</svg>
	</button>
</nav>
    </div>
	<div className="flex justify-end space-x-4">
		<button type="button" className="px-6 py-2 border rounded-md dark:border-violet-400">Back
			<span className="sr-only sm:not-sr-only">to shop</span>
		</button>
		<button type="button" className="px-6 py-2 border rounded-md dark:bg-violet-400 dark:text-gray-900 dark:border-violet-400">
			<span className="sr-only sm:not-sr-only">Continue to</span>Checkout
		</button>
	</div>
</div>
            </div>
    }
}