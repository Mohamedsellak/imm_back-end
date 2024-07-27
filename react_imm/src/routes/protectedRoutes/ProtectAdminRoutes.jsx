import React from 'react'
import { Navigate, Outlet } from 'react-router-dom'


export default function ProtectAdminRoutes() {
  const token = true
  return token ? <Outlet/> : <Navigate to={'/login'} />
}
