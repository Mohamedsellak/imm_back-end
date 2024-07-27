import { Routes,Route } from "react-router-dom";
import GuestsRoutes from "./routes/GuestsRoutes";
import UsersRoutes from "./routes/UsersRoutes"
import AdminRoutes from "./routes/AdminRoutes"

import Home from './guests/Home'
import Login from './auth/Login'
import Register from './auth/Register'
import Pricing from './auth/Pricing'

import HomeAdmin from "./admin/Home"

export default function App() {
  return (
    <div>
      <Routes>

        <GuestsRoutes/>
        
        <Route element={<UsersRoutes/>}>
          
        </Route>

        <Route element={<AdminRoutes/>}>
          <Route path='/adm' element={<HomeAdmin/>} exact/>
        </Route>
        
      </Routes>
    </div>
  )
}

