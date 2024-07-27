import React from 'react'
import { Navigate, Outlet, Route,Routes } from 'react-router-dom'
// import Home from "../admin/Home"


export default function AdminRoutes() {
  const token = true
  return token ? <Outlet/> : <Navigate to={'/login'} />
}
