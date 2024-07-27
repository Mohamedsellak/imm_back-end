import React from 'react'
import { Route,Routes } from 'react-router-dom'
import Home from "../users/Home"

export default function UsersRoutes() {
  return (
    <div>
      <Routes>
        <Route path='/usr' element={<Home/>} exact/>
      </Routes>
    </div>
  )
}
