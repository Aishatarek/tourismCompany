import React, { useEffect, useState } from "react";
import { useNavigate } from 'react-router-dom';
import PulseLoader   from "react-spinners/PulseLoader";
import {
  BrowserRouter,
  Routes,
  Route,
} from "react-router-dom";
import 'bootstrap/dist/css/bootstrap.min.css';
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import Home from "./Home";
import NavBar from "./NavBar";
import About from "./About";
import ContactUs from "./ContactUs";
import Tours from "./Tours";
import NotFound from "./NotFound";
import { SpinnerInfinity } from 'spinners-react';

import './App.css';
import Destination from "./Destination";
import Blog from "./Blog";
import DestinationDetail from "./DestinationDetail";
import TourDetail from "./TourDetail";
import Packages from "./Packages";
import PackageDetail from "./PackageDetail";
import Team from "./Team";
import Transportation from "./Transportation";
import BlogDetail from "./BlogDetail";
import { useTranslation } from "react-i18next";
import ScrollToTop from "./ScrollToTop";
import DestinationSearch from "./DestinationSearch";

function App() {
  const [loading, setLoading] = useState(false);
  const { t, i18n } = useTranslation();

  useEffect(() => {

    setLoading(true);
    setTimeout(() => {
      setLoading(false);

    }, 3000);
    
  }, [])
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  return (
    <BrowserRouter>
      {loading ?
        <div className="preloaderr">
          <SpinnerInfinity color="#edb73d"  loading={loading} height={90} margin={5}/>

        </div> :
        <div className={t("dir")}>
          <NavBar />
          <ScrollToTop />

          <Routes>

            <Route path="/" element={<Home />} />
            <Route path="/About" element={<About />} />
            <Route path="/ContactUs" element={<ContactUs />} />
            <Route path="/Tours" element={<Tours />} />
            <Route path="/Destination" element={<Destination />} />
            <Route path="/Destination/:id" element={<DestinationDetail />} />
            <Route path="/Tours/:id" element={<TourDetail />} />
            <Route path="/Packages" element={<Packages />} />
            <Route path="/Packages/:id" element={<PackageDetail />} />
            <Route path="/Team" element={<Team />} />
            <Route path="/Transportation" element={<Transportation />} />
            <Route path="/Blog" element={<Blog />} />
            <Route path="/Blog/:id" element={<BlogDetail />} />

            <Route path="*" element={<NotFound />} />
            
          </Routes>
        </div>
      }
    </BrowserRouter>
  );
}

export default App;
