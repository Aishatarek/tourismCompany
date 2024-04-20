import React, { useEffect, useState } from "react";
import { Container, Row, Col } from "react-bootstrap";
import { FiInstagram } from "react-icons/fi";
import { AiOutlineTwitter, AiFillFacebook } from "react-icons/ai";
import Footer from "./Footer";
import axios from "axios";
import { Link, useParams } from "react-router-dom";
import { useTranslation } from "react-i18next";

/*       <RiDoubleQuotesL />
<!-- <GiBreakingChain />-->
*/
function BlogDetail() {
  const { id } = useParams();

  const [bloggs, setBlogg] = useState([]);
  const [blogs, setBlog] = useState([]);
  const [bloggDesc, setBloggDesc] = useState([]);
  const { t, i18n } = useTranslation();

  useEffect(() => {
    loadBlogg();
    loadBlog();
    loadBloggDesc();
  }, []);
  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
  };
  const loadBlogg = async () => {
    const result = await axios.get(
      `https://elagamy-eg.com/dashboard/blog/readAll.php/?id=${id}`
    );

    setBlogg(result.data);
  };
  const loadBlog = async () => {
    const result = await axios.get(
      `https://elagamy-eg.com/dashboard/blog/readAll.php`
    );

    setBlog(result.data.reverse());
  };
  const loadBloggDesc = async () => {
    const result = await axios.get(
      `https://elagamy-eg.com/dashboard/blog_desc/readAll.php`
    );

    setBloggDesc(result.data);
  };
  return (
    <div>
      <section
        className="aboutsec1"
        style={{
          backgroundImage:
            bloggs && bloggs.img
              ? `url(https://elagamy-eg.com/uploads/blogs/${
                  bloggs && bloggs.img ? bloggs.img : null
                })`
              : "none",
        }}
      >
        <h3
          className=" wow slideInDown"
          data-wow-duration="2s"
          data-wow-delay="0.2s"
        >
          {bloggs && bloggs.title_en
            ? t("dir") == "ltr"
              ? bloggs.title_en
              : bloggs.title_ar
            : null}
        </h3>
      </section>
      <section>
        <Container>
          <Row>
            <Col lg="9" md="9" sm="12">
              <div className="divbloggg">
                <div className="tab-content" id="ex1-content">
                  <div className="fade blogdivall show active">
                    <div
                      className=" wow slideInRight"
                      data-wow-duration="2s"
                      data-wow-delay="0.2s"
                    >
                      <div className="ssecblog">
                        <h3>
                          {" "}
                          {bloggs && bloggs.title_en
                            ? t("dir") == "ltr"
                              ? bloggs.title_en
                              : bloggs.title_ar
                            : null}
                        </h3>
                        <p>
                          {bloggs && bloggs.description_en
                            ? t("dir") == "ltr"
                              ? bloggs.description_en
                              : bloggs.description_ar
                            : null}
                        </p>
                      </div>

                      {bloggDesc.map((bloggsDescc) => (
                        <>
                          {bloggs && bloggs.id ? (
                            bloggsDescc.blog_id == bloggs.id ? (
                              <div
                                className="ssecblog wow slideInRight"
                                data-wow-duration="2s"
                                data-wow-delay="0.2s"
                              >
                                <h3>
                                  {t("dir") == "ltr"
                                    ? bloggsDescc.title_en
                                    : bloggsDescc.title_ar}
                                </h3>
                                <p>
                                  {t("dir") == "ltr"
                                    ? bloggsDescc.title_en
                                    : bloggsDescc.title_ar}
                                </p>
                              </div>
                            ) : (
                              ""
                            )
                          ) : (
                            ""
                          )}
                        </>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            </Col>
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
                <h3>{t("RecentPosts")}</h3>
                {blogs.slice(0, 3).map((blog) => (
                  <Link to={`/Blog/${blog.id}`}>
                    <div className="imgblogg">
                      <img
                        src={`https://elagamy-eg.com/uploads/blogs/${blog.img}`}
                        alt=""
                      />
                      <div>
                        <p>
                          {" "}
                          {t("dir") == "ltr" ? blog.title_en : blog.title_ar}
                        </p>

                        <h5>
                          {t("dir") == "ltr"
                            ? blog.description_en.slice(0, 15)
                            : blog.description_ar.slice(0, 15)}
                        </h5>
                      </div>
                    </div>
                  </Link>
                ))}
              </div>
            </Col>
          </Row>
        </Container>
      </section>
      <Footer />
    </div>
  );
}
export default BlogDetail;
