import { Component, ReactNode } from "react";
import React from "react";
import Navbar from "./layouts/Navbar";
import Shopping from "./Shopping";
import Sidebar from "./layouts/Sidebar";
import Card from "./Card";


export default class Home extends Component{

    render():ReactNode
    {
        return (<div className="grid grid-cols-2">

   <Shopping></Shopping>
   <div><Sidebar></Sidebar></div>
        </div>)
    }
}
