import React, { useEffect } from "react";
import { useAuthContext } from "../config/authContext";

export default function Logout() {
  const {logout} = useAuthContext();
  useEffect(()=> logout());
  return null;
}
