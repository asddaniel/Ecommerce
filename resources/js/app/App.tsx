import React, { Component } from 'react'
import  ReactDOM  from 'react-dom/client'
import Home from './pages/Home';
import Navbar from './Components/layouts/Navbar';
import Footer from './Components/layouts/Footer';
import Cart from './pages/Cart';
import LivreurPage from './pages/LivreurPage';
import ProductList from './pages/ProductList';
import ProductPage from './pages/ProductPage';
import Discussion from './pages/Discussion';




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
    {
      path: "/cart",
      element: <Cart  />,

    },
    {
        path: "/livreurs",
        element:<LivreurPage/>
    },
    {
        path: "/productlist",
        element:<ProductList/>
    },
    {
        path: "/produit/:id",
        element:<ProductPage />
    },
    {
        path: "/produits/:id/discussion",
        element:<Discussion />
    }



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
