import React, { useEffect, useState } from "react";
import { useNavigate } from 'react-router-dom';

function NotFound() {
  let navigate = useNavigate();

  useEffect(() => {
    navigate("/")

}, [])
  return (
    <div>NotFound</div>
  )
}

export default NotFound