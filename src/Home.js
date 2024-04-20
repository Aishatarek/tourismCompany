import React, { useEffect, useRef, useState } from "react";
import { Container, Row, Col } from "react-bootstrap";

import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination, Autoplay, EffectFade } from "swiper";
import { FaTripadvisor } from "react-icons/fa";
import { FreeMode } from "swiper";
import { GiMountainClimbing } from "react-icons/gi";
import { IoBoatOutline } from "react-icons/io5";
import { FaRegClock } from "react-icons/fa6";
import { SiYourtraveldottv } from "react-icons/si";
import { BiCategoryAlt } from "react-icons/bi";
import { BsFillSendFill } from "react-icons/bs";
import { FaTreeCity } from "react-icons/fa6";
import { TbSunset2 } from "react-icons/tb";
import { GiGlassCelebration } from "react-icons/gi";
import { PiMedal } from "react-icons/pi";
import { IoIosPeople } from "react-icons/io";
import { FaLocationDot } from "react-icons/fa6";
import { FaCalendarCheck } from "react-icons/fa";
import { FaPersonWalkingLuggage } from "react-icons/fa6";
import { FaStar } from "react-icons/fa6";
import { TfiQuoteRight } from "react-icons/tfi";
import Footer from "./Footer";
import "swiper/css/effect-fade";
import axios from "axios";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";

import emailjs from "@emailjs/browser";
function Home() {
  const [destinations, setDestination] = useState([]);
  const [packages, setPackages] = useState([]);
  const [tours, setTours] = useState([]);
  const [reviews, setReviews] = useState([]);
  const { t, i18n } = useTranslation();
  const form2 = useRef();
  const form3 = useRef();
  const [searchTerm, setSearchTerm] = useState(0);

  const handleInputChange = (e) => {
    setSearchTerm(e.target.value);
  };

  const sendEmail = (e) => {
    alert("Message sent successfully");
    e.preventDefault();
    emailjs
      .sendForm(
        "service_tfpjcb4",
        "template_hhavxaq",
        form2.current,
        "6VEs_wJJ1GfhmXXZx"
      )
      .then(
        (result) => {
          console.log(result.text);
        },
        (error) => {
          console.log(error.text);
        }
      );
    e.target.reset();
  };
  const sendEmail2 = (e) => {
    alert("Message sent successfully");
    e.preventDefault();
    emailjs
      .sendForm(
        "service_tfpjcb4",
        "template_hhavxaq",
        form3.current,
        "6VEs_wJJ1GfhmXXZx"
      )
      .then(
        (result) => {
          console.log(result.text);
        },
        (error) => {
          console.log(error.text);
        }
      );
    e.target.reset();
  };
  useEffect(() => {
    loadDestination();
    loadPackages();
    loadTours();
    loadReviews();
  }, []);
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  const loadDestination = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/destination/readAll.php"
    );
    setDestination(result.data);
  };
  const loadPackages = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/packages/readAll.php"
    );
    setPackages(result.data.reverse());
  };
  const loadTours = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/tours/readAll.php"
    );
    setTours(result.data.reverse());
  };
  const loadReviews = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/reviews/readAll.php"
    );
    setReviews(result.data.reverse());
  };
  return (
    <>
      <section className="homeSec1">
        <div>
          <Swiper
            spaceBetween={30}
            effect={"fade"}
            modules={[EffectFade, Autoplay]}
            autoplay={{
              delay: 2000,
              disableOnInteraction: false,
            }}
            loop={true}
            className="mySwiper"
          >
            <SwiperSlide
              style={{ backgroundImage: "url('images/img(2).jpeg')" }}
              className="animeslide-slide"
            >
              <div className="overlay"></div>
              <div className="container">
                <h5>{t("title")}</h5>
                <h1 data-animate="bottom">{t("message")}</h1>
                <p data-animate="bottom" className="animeslide-desc">
                  {t("description")}
                </p>
                <div className="homeBtn">
                  <Link to="/Destination">
                    <button>
                      <BsFillSendFill /> {t("DiscoverMore")}
                    </button>
                  </Link>
                  <div className="d-flex align-items-center">
                    <FaTripadvisor />
                    <p>Trip Advisor</p>
                  </div>
                </div>
              </div>
            </SwiperSlide>
            <SwiperSlide
              style={{ backgroundImage: "url('images/img(3).jpeg')" }}
              className="animeslide-slide"
            >
              <div className="overlay"></div>
              <div className="container">
                <h5>{t("title")}</h5>
                <h1 data-animate="bottom">{t("description2")}</h1>
                <p data-animate="bottom" className="animeslide-desc">
                  {t("message2")}
                </p>
                <div className="homeBtn">
                  <Link to="/Destination">
                    <button>
                      <BsFillSendFill /> {t("DiscoverMore")}
                    </button>
                  </Link>
                  <div className="d-flex align-items-center">
                    <FaTripadvisor />
                    <p>Trip Advisor</p>
                  </div>
                </div>
              </div>
            </SwiperSlide>
            <SwiperSlide
              style={{ backgroundImage: "url('images/img(7).jpeg')" }}
              className="animeslide-slide"
            >
              <div className="overlay"></div>
              <div className="container">
                <h5>{t("title")}</h5>
                <h1 data-animate="bottom">{t("description3")}</h1>
                <p data-animate="bottom" className="animeslide-desc">
                  {t("message3")}
                </p>
                <div className="homeBtn">
                  <Link to="/Destination">
                    <button>
                      <BsFillSendFill /> {t("DiscoverMore")}
                    </button>
                  </Link>
                  <div className="d-flex align-items-center">
                    <FaTripadvisor />
                    <p>Trip Advisor</p>
                  </div>
                </div>
              </div>
            </SwiperSlide>
         

            <SwiperSlide
              style={{ backgroundImage: "url('images/img(10).jpeg')" }}
              className="animeslide-slide"
            >
              <div className="overlay"></div>
              <div className="container">
                <h5>{t("title")}</h5>
                <h1 data-animate="bottom">{t("message")}</h1>
                <p data-animate="bottom" className="animeslide-desc">
                  {t("description")}
                </p>
                <div className="homeBtn">
                  <Link to="/Destination">
                    <button>
                      <BsFillSendFill /> {t("DiscoverMore")}
                    </button>
                  </Link>
                  <div className="d-flex align-items-center">
                    <FaTripadvisor />
                    <p>Trip Advisor</p>
                  </div>
                </div>
              </div>
            </SwiperSlide>
        
          </Swiper>
        </div>
      </section>
      <section className="homesec2">
        <Container>
          <form>
            <Row>
              <Col lg="4" md="4" sm="12">
                <div>
                  <FaLocationDot />
                  <select value={searchTerm} onChange={handleInputChange}>
                    <option value="" className="option selected">
                      {t("Whereto")}
                    </option>
                    {destinations.map((destination) => (
                      <option value={destination.id} className="option">
                        {t("dir") == "ltr"
                          ? destination.title_en
                          : destination.title_ar}
                      </option>
                    ))}
                  </select>
                </div>
              </Col>
              <Col lg="4" md="4" sm="12">
                <div>
                  <FaCalendarCheck />
                  <select className="list">
                    <option value="" className="option selected focus">
                      {t("SelectMonth")}
                    </option>
                    <option value="1" className="option">
                      {t("January")}
                    </option>
                    <option value="2" className="option">
                      {t("February")}
                    </option>
                    <option value="3" className="option">
                      {t("March")}
                    </option>
                    <option value="4" className="option">
                      {t("April")}
                    </option>
                    <option value="5" className="option">
                      {t("May")}
                    </option>
                    <option value="6" className="option">
                      {t("June")}
                    </option>
                    <option value="7" className="option">
                      {t("July")}
                    </option>
                    <option value="8" className="option">
                      {t("August")}
                    </option>
                    <option value="9" className="option">
                      {t("September")}
                    </option>
                    <option value="10" className="option">
                      {t("October")}
                    </option>
                    <option value="11" className="option">
                      {t("November")}
                    </option>
                    <option value="12" className="option">
                      {t("December")}
                    </option>
                  </select>
                </div>
              </Col>

              <Col lg="3" md="3" sm="12">
                <Link to={`/Destination/${searchTerm}`}>
                  <button type="button">{t("FindNow")}</button>
                </Link>
              </Col>
            </Row>
          </form>
        </Container>
      </section>
      <section className="homesec3">
        <div className="repeativeDiv">
          <p>{t("TRAVELCATEGORY")}</p>
          <h2>{t("PopularTours")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />
            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            <Col lg="2" md="2" sm="12">
              <div>
                <div>
                  <GiMountainClimbing />
                </div>
                <h3>{t("Adventure")}</h3>
              </div>
            </Col>
            <Col lg="2" md="2" sm="12">
              <div>
                <div>
                  <FaTreeCity />
                </div>
                <h3>{t("CityTour")}</h3>
              </div>
            </Col>
            <Col lg="2" md="2" sm="12">
              <div>
                <div>
                  <IoBoatOutline />
                </div>
                <h3>{t("CruisesTour")}</h3>
              </div>
            </Col>
            <Col lg="2" md="2" sm="12">
              <div>
                <div>
                  <TbSunset2 />
                </div>
                <h3>{t("SeaTour")}</h3>
              </div>
            </Col>
            <Col lg="2" md="2" sm="12">
              <div>
                <div>
                  <FaPersonWalkingLuggage />
                </div>
                <h3>{t("Travel")}</h3>
              </div>
            </Col>
            <Col lg="2" md="2" sm="12">
              <div>
                <div>
                  <GiGlassCelebration />
                </div>
                <h3>{t("Wedding")}</h3>
              </div>
            </Col>
          </Row>
        </Container>
      </section>
      <section className="homesec4">
        <div className="repeativeDiv">
          <p>{t("tours")}</p>
          <h2>{t("ElAgamyTours")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            {tours.slice(0, 4).map((tour) => (
              <Col lg="3" md="3" sm="12">
                <div>
                  <div>
                    <img
                      src={"https://elagamy-eg.com/uploads/tours/" + tour.img}
                      alt=""
                    />
                  </div>
                  <h3>{t("dir") == "ltr" ? tour.title : tour.title_ar} </h3>
                  <p>
                    <span>
                      {t("FROM")} ${tour.price}{" "}
                    </span>
                  </p>
                  <Link to={`/Tours/${tour.id}`}>
                    <button>{t("EXPLORE")}</button>
                  </Link>
                </div>
              </Col>
            ))}
          </Row>
        </Container>
      </section>
      <section className="homesec5">
        <div className="repeativeDiv">
          <p>{t("Destinations")}</p>
          <h2>{t("ElAgamyDestinations")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>
        <Container>
          <Row>
            {destinations.slice(0, 4).map((destination) => (
              <Col lg="3" md="3" sm="12">
                <div>
                  <img
                    src={
                      "https://elagamy-eg.com/uploads/destinations/" +
                      destination.img
                    }
                    alt=""
                  />
                  <div>
                    <Link to={`/Destination/${destination.id}`}>
                      <h3>
                        {t("dir") == "ltr"
                          ? destination.title_en
                          : destination.title_ar}
                      </h3>
                    </Link>
                  </div>
                </div>
              </Col>
            ))}
          </Row>
        </Container>
        <Link to="/Destination">
          <button>{t("AllDestinations")}</button>
        </Link>
      </section>
      <section className="homesec6">
        <Container>
          <div>
            <h5>{t("VIBE")}</h5>
            <h3>
              {t("LifeBegins")}
              <br /> {t("Comfort")}
            </h3>
            <p>{t("invit")}</p>
            <button>{t("DiscoverMore")}</button>
          </div>
        </Container>
      </section>
      <section className="homesec7">
        <form ref={form2} onSubmit={sendEmail}>
          <div className="repeativeDiv">
            <h2>{t("FeelFree")}</h2>
            <div className="borderdivs">
              <div className="leftBorder"></div>
              <img src="images/logo.png" alt="" />

              <div className="rightBorder"></div>
            </div>
          </div>
          <div className="d-flex">
            <input type="text" name="name" placeholder={t("Name")} />
            <input type="email" name="email" placeholder={t("Email")} />
          </div>
          <textarea placeholder={t("Messagehere")} name="message"></textarea>
          <button>{t("Send")}</button>
        </form>
      </section>
      <section className="homesec8">
        <div className="repeativeDiv">
          <p>{t("CHOOSE")}</p>
          <h2>{t("BestPackages")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>
        <Swiper
          slidesPerView={1}
          spaceBetween={30}
          slidesPerGroup={1}
          // loop={true}
          loopFillGroupWithBlank={true}
          autoplay={{ delay: 2000 }}
          modules={[Autoplay]}
          breakpoints={{
            640: {
              slidesPerView: 3,
            },
            768: {
              slidesPerView: 3,
            },
          }}
          // modules={[Autoplay]}
          // className="mySwiper clientslider"
          className="mySwiper fadeInUp wow"
          data-wow-duration="0.5s"
        >
          {packages.slice(0, 7).map((packagee) => (
            <SwiperSlide>
              <div>
                <img
                  src={
                    "https://elagamy-eg.com/uploads/packages/" + packagee.img
                  }
                  alt=""
                />
                <div className="content">
                  <p>
                    <span>
                      {t("FROM")} ${packagee.price}{" "}
                    </span>
                    {packagee.sale == 1 ? (
                      <>
                        / <del> ${packagee.old_price} </del>
                      </>
                    ) : (
                      ""
                    )}
                  </p>
                  <h4>
                    {t("dir") == "ltr" ? packagee.title_en : packagee.title_ar}
                  </h4>
                  <div className="best-plan-meta">
                    {/* <span className="duration">
                      <FaRegClock />8 Days / 9 Night{" "}
                    </span> */}
                    <span className="rating"></span>
                  </div>
                  <div className="list-area">
                    <h4>{t("Included")}</h4>
                    <ul className="plan-list1">
                      <li>
                        <span>-</span>
                        {t("dir") == "ltr"
                          ? packagee.included_en
                          : packagee.included_ar}
                      </li>
                    </ul>
                  </div>
                  <Link
                    to={`/Packages/${packagee.id}`}
                    className="eg-btn btn--primary-outline btn--md"
                  >
                    {t("EXPLORE")}
                  </Link>
                </div>
              </div>
            </SwiperSlide>
          ))}
        </Swiper>
      </section>
      <section className="homesec9">
        <div className="repeativeDiv">
          <p>{t("CATEGORY")}</p>
          <h2>{t("PopularTours")}</h2>
          <div className="borderdivs">
            <div className="leftBorder"></div>
            <img src="images/logo.png" alt="" />

            <div className="rightBorder"></div>
          </div>
        </div>

        <Container>
          <Row>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <SiYourtraveldottv />
                </div>
                <h3>400+</h3>
                <p>{t("AwesomeTour")}</p>
              </div>
            </Col>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <FaPersonWalkingLuggage />
                </div>
                <h3>250+</h3>
                <p>{t("StunningPlaces")}</p>
              </div>
            </Col>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <PiMedal />
                </div>
                <h3>1050+</h3>
                <p>{t("Customer")}</p>
              </div>
            </Col>
            <Col lg="3" md="3" sm="12">
              <div>
                <div>
                  <IoIosPeople />
                </div>
                <h3>500+</h3>
                <p>{t("Guides")}</p>
              </div>
            </Col>
          </Row>
        </Container>
      </section>
      <section className="homesec10">
        <Container fluid>
          <Row style={{ direction: "ltr" }}>
            <Col lg="6" md="6" sm="12" className="opinionRow">
              <TfiQuoteRight className="qote10" />

              <Swiper
                spaceBetween={30}
                modules={[Autoplay]}
                autoplay={{
                  delay: 2000,
                  disableOnInteraction: false,
                }}
                loop={true}
                className="mySwiper"
              >
                {reviews.map((review) => (
                  <SwiperSlide>
                    <div className="testimonial-single1">
                      <div className="testimonial-content">
                        <ul className="star-list">
                          <li>
                            <FaStar />
                          </li>
                          <li>
                            <FaStar />
                          </li>
                          <li>
                            <FaStar />
                          </li>
                          <li>
                            <FaStar />
                          </li>
                          <li>
                            <FaStar />
                          </li>
                        </ul>

                        <p>“{review.opinion}”</p>
                      </div>
                      <div className="testi-author1">
                        <div className="image">
                          {/* <img
                          decoding="async"
                          src="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/testi11.png"
                          alt=""
                        /> */}
                        </div>
                        <div className="author-text">
                          <h5>{review.name}</h5>

                          <p>{review.country}</p>
                        </div>
                      </div>
                    </div>
                  </SwiperSlide>
                ))}
              </Swiper>
            </Col>
            <Col lg="6" md="6" sm="12" className="banner8">
              <div className="banner-form-box">
                <h3>{t("Experiment")}</h3>
                <p>{t("ensuring")}</p>
                <form
                  className="newsletter-form"
                  ref={form3}
                  onSubmit={sendEmail2}
                >
                  <input type="text" name="name" placeholder={t("Name")} />
                  <input
                    type="email"
                    name="email"
                    placeholder={t("Email")}
                    required=""
                  />
                  <textarea
                    placeholder={t("Messagehere")}
                    required=""
                    name="message"
                  ></textarea>
                  <button type="submit">{t("Join")}</button>
                </form>
              </div>
            </Col>
          </Row>
        </Container>
      </section>
      <Footer />
    </>
  );
}

export default Home;
