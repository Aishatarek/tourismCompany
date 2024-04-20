import React, { useEffect } from 'react';
import {  useLocation } from 'react-router-dom';

const ScrollToTop = () => {
  const location = useLocation();

  useEffect(() => {
    window.scrollTo(0, 0);
  }, [location]);

  return null; // This component doesn't render anything, it just handles scrolling
};

export default ScrollToTop;
