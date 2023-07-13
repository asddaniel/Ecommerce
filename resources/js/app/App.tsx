import React, { Component } from 'react'
import  ReactDOM  from 'react-dom/client'
import Home from './Components/Home';
import Navbar from './Components/layouts/Navbar';
import Footer from './Components/layouts/Footer';




import {
    createBrowserRouter,
    RouterProvider,
  } from "react-router-dom"

import { Routes, Route, useLocation } from 'react-router-dom';


const router = createBrowserRouter([
    {
      path: "/",
      element: <Home  />,
    },

  ]);
//   const locationpath = useLocation()
//   console.log(locationpath.pathname)






if(document.getElementById("root")){
    ReactDOM.createRoot(document.getElementById('root')).render(
        <React.StrictMode>
             <Navbar/>
            <RouterProvider router={router} />
            <Footer></Footer>
          {/* <App /> */}
        </React.StrictMode>,
      )

}
