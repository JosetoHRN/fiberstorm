import { Navigate, Outlet } from "react-router-dom";
import { useAuthContext } from '../../config/authContext';

export default function PrivateRoute() {
    const {isAuth} = useAuthContext();

    if (!isAuth){
        return <Navigate to='/' />;
    }

    return (
        <div>
            <Outlet />
        </div>
    );
}