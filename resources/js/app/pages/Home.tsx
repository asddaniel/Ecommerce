import { Component, ReactNode } from "react";
import React from "react";
import Shopping from "../Components/Shopping";
import Sidebar from "../Components/layouts/Sidebar";
import CardProduct from "../Components/CardProduct";
import PreviewProduct from "../Components/PreviewProduct";


export default class Home extends Component{
    constructor(props){
        super(props)

        this.state = {
            products: [

            ]
        }
    }
    componentDidMount(): void {
        
        fetch(document.getElementById("api")?.value).then(res => res.json()).then(data => {
            this.setState({
                products: data
        })

        console.log(data)
    })
    .catch(err => {
        console.log(err)
        console.error(err)
    })
    }


    render():ReactNode
    {
        return (<div className="grid grid-cols-5 px-2 pt-3 pb-3">
            <div className="col-span-5 justify-center">
            <div className="grid grid-cols-4 gap-2">
                {this.state?.products?.map((product) => (
                    <PreviewProduct key={product.id} {...product} />
                ))}

            </div>

            </div>


   <div></div>
        </div>)
    }
}
