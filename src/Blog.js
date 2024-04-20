import React, { useEffect, useState } from "react";
import { Container, Row, Col } from "react-bootstrap";
import { FiInstagram } from "react-icons/fi";
import { AiOutlineTwitter, AiFillFacebook } from "react-icons/ai";
import Footer from "./Footer";
import axios from "axios";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";

/*       <RiDoubleQuotesL />
<!-- <GiBreakingChain />-->
*/
function Blog() {
  const [blogs, setBlog] = useState([]);
  const [packages, setPackages] = useState([]);
  const { t, i18n } = useTranslation();

  useEffect(() => {
    loadBlog();
    loadPackages();
  }, []);

  const loadBlog = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/blog/readAll.php"
    );
    setBlog(result.data.reverse());
  };
  const loadPackages = async () => {
    const result = await axios.get(
      "https://elagamy-eg.com/dashboard/packages/readAll.php"
    );
    setPackages(result.data.reverse());
  };
  return (
    <div>
      <section className="aboutsec1">
        <h3
          className=" wow slideInDown"
          data-wow-duration="2s"
          data-wow-delay="0.2s"
        >
          {t("Blog")}
        </h3>
      </section>
      <section>
        <Container>
          <Row>
            <Col
              lg="3"
              md="3"
              sm="12"
              className=" wow slideInLeft"
              data-wow-duration="2s"
              data-wow-delay="0.2s"
            >
              <div>
                <div className="fsecbloggg">
                  <img src="images/blog-img-02.png" alt="" />
                  <h3>{t("ElAgamyAgency")}</h3>
                  <FiInstagram />
                  <AiOutlineTwitter />
                  <AiFillFacebook />
                </div>
                <h3> {t("AmazingDeals")}</h3>

                {packages.slice(0, 3).map((packagee) => (
                  <Link to={`/Packages/${packagee.id}`}>
                    <div className="imgblogg">
                      <img
                        src={`https://elagamy-eg.com/uploads/packages/${packagee.img}`}
                        alt=""
                      />
                      <div>
                        <p>{t("dir") == "ltr" ? packagee.title_en : packagee.title_ar}</p>

                        <h5>{t("dir") == "ltr" ? (packagee.description_en).slice(0, 15) : (packagee.description_ar).slice(0, 15)}...</h5>
                      </div>
                    </div>
                  </Link>
                ))}
              </div>
            </Col>
            <Col lg="9" md="9" sm="12">
              <div className="divbloggg">
                <div className="tab-content" id="ex1-content">
                  {blogs.map((blog) => (
                    <Link to={`/Blog/${blog.id}`}>
                      <div
                        className="fade blogdivall show  wow slideInRight"
                        data-wow-duration="2s"
                        data-wow-delay="0.2s"
                      >
                        <div className="fsecblog ">
                          <img
                            height="250px"
                            src={`https://elagamy-eg.com/uploads/blogs/${blog.img}`}
                            alt=""
                          />
                        </div>
                        <div className="ssecblog">
                          <h3>{t("dir") == "ltr" ? blog.title_en : blog.title_ar}</h3>
                          <p>{t("dir") == "ltr" ? (blog.description_en).slice(0, 20) : (blog.description_ar).slice(0, 20)}...</p>
                        </div>
                      </div>
                    </Link>
                  ))}
                </div>
              </div>
            </Col>
          </Row>
        </Container>
      </section>
      <Footer />
    </div>
  );
}
export default Blog;
