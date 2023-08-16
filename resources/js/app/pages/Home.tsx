import { Component, ReactNode } from "react";
import React from "react";
import Shopping from "../Components/Shopping";
import Sidebar from "../Components/layouts/Sidebar";
import CardProduct from "../Components/CardProduct";
import PreviewProduct from "../Components/PreviewProduct";

interface props{
    products : any[],
    categories: any[],
    filtered_products: any[]
}
export default class Home extends Component<{},props>{
    constructor(props:any){
        super(props)

        this.state  = {
            products: [

            ],
            categories: [

            ],
            filtered_products: []
        }
    }
    componentDidMount(): void {
        const myelement: HTMLInputElement|any = document.getElementById("api");

        fetch(myelement?.value).then(res => res.json()).then(data => {
            this.setState({
                products: data,
                filtered_products: data
        })

        console.log(data)
    })
    .catch(err => {
        console.log(err)
        console.error(err)
    })

    fetch(location.pathname.split("/")[0]+"categories/all").then(res => res.json()).then(data => {
        console.log(data)
        this.setState({
            categories: data.data
        })
    })
    .catch(err=> {
        console.log(err)
        console.error(err)
    })
    }


    render():ReactNode
    {
        return (<div className="grid grid-cols-5 px-2 pt-3 pb-3">
            <div className="col-span-5 justify-center">
            <div>
                    <select name="selecteur" onChange={(e)=>{
                        if(e.target.value!=""){
                            this.setState({filtered_products: this.state.products.filter(product => product.categorie == e.target.value)})

                        }else{
                            this.setState({filtered_products: this.state.products})
                        }
                        }}>
                            <option value="">Tous les produits</option>
                        {this.state?.categories?.map((category) => (
                            <option key={category.id} value={category.name}>{category.name}</option>
                        ))}
                    </select>
                </div>
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">

                {this.state?.filtered_products?.map((product) => (
                    <PreviewProduct key={product.id} {...product} />
                ))}

            </div>

            </div>


   <div></div>
        </div>)
    }
}
