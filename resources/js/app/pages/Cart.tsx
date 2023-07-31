import { Component, ReactNode } from "react";
import React from "react";
import Shopping from "../Components/Shopping";
import Sidebar from "../Components/layouts/Sidebar";
import Testimony from "../Components/Testimony";


export default class Cart extends Component{

    render():ReactNode
    {
        return (<div className="grid cols-1 md:grid-cols-5">
            <div className="md:col-span-3 ">
            <Shopping></Shopping>

            </div>


   <div className="col-span-2 px-2 bg-gray-200 ">
   <Testimony></Testimony></div>
        </div>)
    }
}
