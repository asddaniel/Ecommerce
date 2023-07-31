import { Component, ReactNode } from "react";
import React from "react";
import Shopping from "./Shopping";
import Sidebar from "./layouts/Sidebar";
import CardProduct from "./CardProduct";



export default class Home extends Component{

    render():ReactNode
    {
        return (<div className="grid grid-cols-3">
            <div className="col-span-2">
            <Shopping></Shopping>

            </div>


   <div><Sidebar></Sidebar></div>
        </div>)
    }
}
