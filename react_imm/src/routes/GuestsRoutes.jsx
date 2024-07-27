import React from 'react'
import { Route,Routes } from 'react-router-dom'
import Home from '../guests/Home'
import Login from '../auth/Login'
import Register from '../auth/Register'
import Pricing from '../auth/Pricing'

export default function GuestsRoutes() {
  return (
    <>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/login">login</a></li>
        <li><a href="/register">register</a></li>
        <li><a href="/pricing">pricing</a></li>
      </ul>

      {/* <Routes> */}
          <Route path='/' element={<Home /> } exact />
          <Route path='/register' element={<Register/> } exact />
          <Route path='/login' element={<Login/> } exact />
          <Route path='/pricing' element={<Pricing/> } exact />
      {/* </Routes> */}
    </>
  )
}
