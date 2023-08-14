import React, { Component } from 'react'
import  ReactDOM  from 'react-dom'
import Home from './pages/Home';
import Navbar from './Components/layouts/Navbar';
import Footer from './Components/layouts/Footer';
import Cart from './pages/Cart';
import LivreurPage from './pages/LivreurPage';
import ProductList from './pages/ProductList';
import ProductPage from './pages/ProductPage';
import Discussion from './pages/Discussion';
import Payement from './pages/Payement';




import {
    createBrowserRouter,
    RouterProvider,
  } from "react-router-dom"


import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'

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
    },
    {
        path: "/payement",
        element:<Payement />
    }



  ]);
//   const locationpath = useLocation()
//   console.log(locationpath.pathname)






if(document.getElementById("root")){

ReactDOM.render(
    <React.StrictMode>
        <Router>
            <Navbar />
            <Routes>
                <Route path="/" element={<Home />} />
               <Route path='/cart' element={<Cart  />} />
               <Route path='/livreurs' element={<LivreurPage/>} />
               <Route path='/productlist' element={<ProductList/>}/>
               <Route path='/produit/:id' element={<ProductPage />}/>
               <Route path="/produits/:id/discussion" element={<Discussion />} />
               <Route path='/payement' element={<Payement />}/>
            </Routes>
     <Footer></Footer>
        </Router>
    </React.StrictMode>,
  document.getElementById('root')
  )

}
