import React, { useEffect } from "react";
import Container from "react-bootstrap/Container";
import Nav from "react-bootstrap/Nav";
import Navbar from "react-bootstrap/Navbar";
import { MdOutlinePhone } from "react-icons/md";
import { Link, NavLink } from "react-router-dom";
import { HashLink } from "react-router-hash-link";
import NavDropdown from "react-bootstrap/NavDropdown";
import Offcanvas from "react-bootstrap/Offcanvas";
import { useTranslation } from "react-i18next";
import { TbWorld } from "react-icons/tb";
import { useState } from "react";
function NavBar() {
  const [stickyClass, setStickyClass] = useState("relative");
  const [closee, setClosee] = useState(false);
  const [prevScrollPos, setPrevScrollPos] = useState(0);
  const [visible, setVisible] = useState(true);
  const handleScroll = () => {
    const currentScrollPos = window.pageYOffset;
    setVisible(prevScrollPos > currentScrollPos && currentScrollPos > 500);
    setPrevScrollPos(currentScrollPos);
    if (visible) {
      setStickyClass("fixed top-0 left-0 z-50");
    } else {
      setStickyClass("relative");
    }
  };
  useEffect(() => {
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, [prevScrollPos, visible, handleScroll]);
  const { t, i18n } = useTranslation();

  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  return (
    <>
      {["lg"].map((expand) => (
        <Navbar
          className={`h-16 w-full bg-gray-200 ${stickyClass}`}
          expanded={closee}
          key={expand}
          bg="light"
          variant="light"
          expand={expand}
        >
          <Container fluid className="d-flex justify-content-between">
            <NavLink to="/" className="ImgNav">
              <img src="/images/logoo.png" alt="" className="logoImg" />
            </NavLink>
            <Navbar.Toggle
              aria-controls={`offcanvasNavbar-expand-${expand}`}
              onClick={() => setClosee(true)}
            />
            <Navbar.Offcanvas
              id={`offcanvasNavbar-expand-${expand}`}
              aria-labelledby={`offcanvasNavbarLabel-expand-${expand}`}
              placement="end"
              className="justify-content-between "
            >
              <Offcanvas.Header closeButton onClick={() => setClosee(false)}>
                <Offcanvas.Title id={`offcanvasNavbarLabel-expand-${expand}`}>
                  <NavLink
                    to="/"
                    className="offcanlink"
                    onClick={() => setClosee(false)}
                  >
                    <img src="images/logoo.png" alt="" />
                  </NavLink>
                </Offcanvas.Title>
              </Offcanvas.Header>
              <Offcanvas.Body className="w-100 m-auto justify-content-between ">
                <Nav className="navgroup m-auto w-100">
                  <NavLink to="/" onClick={() => setClosee(false)}>
                    {t("Home")}
                  </NavLink>

                  <NavLink to="/About" onClick={() => setClosee(false)}>
                    {t("About")}
                  </NavLink>

                  <NavLink to="/Destination" onClick={() => setClosee(false)}>
                  {t("Destination")}
                    
                  </NavLink>

                  <NavLink to="/Tours" onClick={() => setClosee(false)}>
                    {t("tours")}
                  </NavLink>
                  <NavLink to="/Packages" onClick={() => setClosee(false)}>
                  {t("Packages")}
                  </NavLink>
                  <NavLink to="/Team" onClick={() => setClosee(false)}>
                    
                    {t("Team")}
                  </NavLink>
                  <NavLink to="/Blog" onClick={() => setClosee(false)}>
                    
                    {t("Blog")}

                  </NavLink>
                  <NavLink
                    to="/Transportation"
                    onClick={() => setClosee(false)}
                  >
                    {t("Transportation")}

                    
                  </NavLink>
                  <NavLink to="/ContactUs" onClick={() => setClosee(false)}>
                    {t("contact")}
                  </NavLink>
                </Nav>
                <Nav className=" align-items-center callnav  w-10">
                  <NavDropdown title={<TbWorld />} id="basic-nav-dropdown">
                    <NavDropdown.Item
                      href="#"
                      onClick={() => changeLanguage("en")}
                    >
                      en
                    </NavDropdown.Item>
                    <NavDropdown.Divider />

                    <NavDropdown.Item
                      href="#"
                      onClick={() => changeLanguage("es")}
                    >
                      ar
                    </NavDropdown.Item>
                  </NavDropdown>
                  <div>
                    <MdOutlinePhone className="phoneIcon" />
                    
                    {t("CallNow")}
                    <br />
                    <span style={{ marginLeft: "50px" }}>01012329962</span>
                    <br />
                  </div>
                </Nav>
              </Offcanvas.Body>
            </Navbar.Offcanvas>
          </Container>
        </Navbar>
      ))}
    </>
  );
}

export default NavBar;
