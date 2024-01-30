import './App.css';
import { Route,Routes } from 'react-router-dom';
import Dashboard from './components/Dashboard';
import Register from './components/Register';
import Main from './layouts/Main';
import Login from './components/Login';
import PublicRoutes from './layouts/PublicRoutes';
import PrivateRoutes from './layouts/PrivateRoutes';
import NotFound from './components/NotFound';
import Layout from './layouts/Layout';
import "react-toastify/dist/ReactToastify.css"
import UserList from './components/user/UserList';
function App  ()  {
  return (
    <Routes>
      <Route element={<Layout/>}>
      <Route element={<Main/>}>
        <Route element={<PrivateRoutes/>}>
        <Route path='/' element={<Dashboard/>}/>
        <Route path='/user' element={<UserList/>}/>
        </Route>
      </Route>
      <Route element={<PublicRoutes/>}>
      <Route path='/login' element={<Login/>}/>
      <Route path='/register' element={<Register/>}/>
      </Route>
      </Route>
     
    </Routes>
    
        



  );
}

export default App;
