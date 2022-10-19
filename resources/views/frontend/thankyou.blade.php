@extends('layouts.frontEndMaster')
@section('title','Thank You')
@section('content')

    <section class="data-statistics-area md:mt-32 mt-20 py-20 bg-cover bg-center bg-blue-100"
             style="background-image:url({{asset('frontend/assets/images/statistics-effect-2.svg')}})">
        <div class="container">
            <div class="grid  lg:grid-cols-4 sm:grid-cols-2 gap-6">
                <div
                    class="data-statistics-item bg-white inline-block p-5 rounded shadow-lg  text-center md:border-r border-blue-20"
                    data-aos="fade-up" data-aos-delay="500">
                    <div class="data-statistics-logo ">
              <span>
                <svg class="m-auto mb-6" width="68" height="60" viewBox="0 0 68 60" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M40.2653 11.9467C41.2615 11.476 42.2737 11.0601 43.3005 10.6616C44.3588 10.2511 45.45 9.92671 46.5385 9.6086C47.6378 9.28725 48.7541 9.00628 49.8763 8.77642C50.998 8.54677 52.1188 8.34257 53.249 8.15807C54.3599 7.97682 55.4799 7.85804 56.597 7.72216C57.6948 7.63424 58.7944 7.51861 59.8949 7.47562C60.7694 7.44119 61.6438 7.40286 62.5185 7.36648C63.2239 7.33736 63.8435 6.86431 64.0168 6.16996C64.2079 5.40522 63.7851 4.59588 63.0512 4.31318C62.4515 4.08245 61.7315 4.31156 61.1256 4.41095C60.1502 4.57109 59.1767 4.72971 58.2076 4.92557C58.2635 4.9141 58.284 4.90987 58.1905 4.92882C57.8395 5.0005 57.9899 4.96986 58.1263 4.94214C57.0492 5.16204 55.9783 5.38953 54.9108 5.65285C53.7979 5.92732 52.6989 6.23395 51.5983 6.554C49.4125 7.18978 47.2752 8.00865 45.1909 8.92139C43.7778 9.54028 42.4231 10.2748 41.0827 11.0351C40.4479 11.3953 39.8421 11.8101 39.2391 12.2203C38.7876 12.5273 38.3406 12.8603 37.9281 13.2219C37.9619 13.2088 37.9945 13.1975 38.0283 13.1842C38.7337 12.7108 39.5019 12.3076 40.2653 11.9467Z"
                      fill="#035AE0"/>
                  <path
                      d="M37.9217 11.4486C38.8146 10.7765 39.7279 10.1451 40.6708 9.54516C42.3079 8.50357 44.0313 7.63381 45.7864 6.81191C47.8636 5.83929 50.048 5.12047 52.2382 4.45491C54.1244 3.88161 56.0658 3.51727 57.9974 3.13734C58.748 2.98987 59.3184 2.35582 59.3165 1.5756C59.3143 0.73378 58.6241 0.0245915 57.7843 0.000663124C57.5107 -0.00724081 57.2632 0.0737474 57.0083 0.157876C56.5841 0.297115 56.1598 0.436679 55.7355 0.576135C54.6931 0.919036 53.671 1.30091 52.6466 1.69416C50.4946 2.51964 48.4069 3.54109 46.4003 4.67341C44.7454 5.60715 43.1298 6.62806 41.6144 7.77641C40.4117 8.68774 39.2265 9.63015 38.14 10.6799C37.6187 11.1837 37.0988 11.6892 36.6134 12.2282C36.2193 12.666 35.8101 13.1087 35.4884 13.6041C35.5503 13.5305 35.6125 13.4588 35.6806 13.3907C36.3482 12.6733 37.1409 12.0363 37.9217 11.4486Z"
                      fill="#035AE0"/>
                  <path
                      d="M27.9035 11.6459C26.9582 11.0495 25.9899 10.5074 25.005 9.98052C24.005 9.44608 22.963 8.9856 21.9202 8.54287C20.8787 8.10068 19.823 7.67615 18.7494 7.31787C17.6532 6.95201 16.5584 6.60023 15.4485 6.27769C14.3646 5.96283 13.27 5.69789 12.1742 5.42753C10.1372 4.92503 8.05577 4.60498 5.98722 4.26597C5.6213 4.20599 5.27009 4.18152 4.91661 4.3265C4.47932 4.50591 4.13741 4.88248 4.00247 5.33625C3.71343 6.30811 4.43672 7.3235 5.44829 7.3654C6.22608 7.39777 7.00387 7.42972 7.78155 7.46252C8.87487 7.5081 9.96419 7.60717 11.055 7.69466C12.1789 7.78474 13.3178 7.92409 14.4303 8.10588C15.5505 8.28886 16.665 8.47769 17.777 8.7055C20.0181 9.16479 22.2395 9.76462 24.391 10.5459C25.4228 10.9208 26.4292 11.3491 27.4281 11.8033C28.2977 12.2113 29.1609 12.6548 29.9658 13.1823C30 13.1959 30.0331 13.2073 30.0671 13.2206C29.3998 12.6338 28.6513 12.1172 27.9035 11.6459Z"
                      fill="#035AE0"/>
                  <path
                      d="M9.95597 3.12813C11.774 3.48565 13.5984 3.82952 15.3819 4.33927C17.5835 4.96856 19.7275 5.74369 21.834 6.63954C22.8896 7.08855 23.9112 7.61865 24.9269 8.15038C25.6212 8.51407 26.3103 8.90061 26.9732 9.31865C28.7938 10.4671 30.5825 11.6979 32.1324 13.202C32.2648 13.3304 32.3929 13.4626 32.5117 13.604C32.0039 12.8217 31.3155 12.1417 30.6713 11.4734C29.897 10.6697 29.0585 9.9161 28.1983 9.20626C26.7519 8.01266 25.249 6.90416 23.6604 5.90685C21.6817 4.66442 19.6301 3.55224 17.495 2.60279C16.4448 2.13592 15.3878 1.70813 14.3151 1.29626C13.3478 0.924882 12.3643 0.609158 11.3803 0.285638C11.0236 0.168595 10.6462 0.00174571 10.2652 1.33355e-05C9.74879 -0.00215213 9.25246 0.259544 8.96019 0.685707C8.32859 1.60581 8.86352 2.9131 9.95597 3.12813Z"
                      fill="#035AE0"/>
                  <path
                      d="M65.5696 9.97976C64.9134 9.95648 64.2347 9.94501 63.5527 9.94501C55.2006 9.94501 46.7061 11.6476 41.2885 12.9958V58.5669C46.6039 56.3082 55.9189 52.8184 65.7515 51.3179C66.5203 51.2006 67.0882 50.5388 67.0882 49.7601V11.5545C67.0882 10.7058 66.4167 10.0095 65.5696 9.97976Z"
                      fill="#035AE0"/>
                  <path
                      d="M38.6433 13.1194C36.9558 13.8791 35.4806 14.2326 34 14.2326C32.5193 14.2326 31.0442 13.879 29.3567 13.1194L29.0533 12.9752V12.979C29.054 21.2966 29.0536 34.6391 29.0535 43.429L29.0533 58.5667C29.1173 58.8037 30.2447 60 34 60C37.7555 60 38.8827 58.804 38.9467 58.567V12.9795V12.9755L38.6433 13.1194Z"
                      fill="#035AE0"/>
                  <path
                      d="M2.43034 9.97976C1.58302 10.0095 0.911743 10.7058 0.911743 11.5545V49.7597C0.911743 50.5383 1.47965 51.2003 2.24846 51.3176C12.0813 52.8179 21.3962 56.308 26.7116 58.5666L26.7119 44.3687C26.7121 34.2464 26.7122 22.587 26.7116 12.9954C21.294 11.6476 12.7993 9.9449 4.4471 9.9449C3.76522 9.94501 3.08648 9.95659 2.43034 9.97976Z"
                      fill="#035AE0"/>
                </svg>
              </span>
                    </div>
                    <div class="data-statistics-counter">
                        <h3 class="md:text-4xl text-2xl font-semibold text-black-200 mb-2">
                            <span class="counter-numbers">20 </span>+
                        </h3>
                        <p class="text-lg">Topics Covered</p>
                    </div>
                </div>
                <div
                    class="data-statistics-item bg-white inline-block p-5 rounded shadow-lg  text-center md:border-r border-blue-20"
                    data-aos="fade-up" data-aos-delay="600">
                    <div class="data-statistics-logo ">
              <span>
                <svg class="m-auto mb-6" width="58" height="60" viewBox="0 0 58 60" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M7.42039 13.5615C7.42039 6.07167 13.4921 0 20.9819 0C28.4718 0 34.5433 6.07167 34.5433 13.5615C34.5433 21.0514 28.4718 27.1229 20.9819 27.1229C13.4921 27.1229 7.42039 21.0514 7.42039 13.5615Z"
                      fill="#035AE0"/>
                  <path
                      d="M0.517639 39.1413C1.53808 34.0111 4.8095 29.7242 9.27191 27.3399C12.4269 30.024 16.5153 31.6434 20.9819 31.6434C25.4485 31.6434 29.5368 30.024 32.6917 27.3399C37.154 29.7242 40.4254 34.0111 41.4459 39.1413C41.7768 40.8045 41.7765 42.7338 41.7761 45.7643V50.9343C41.7761 53.4973 40.2156 55.8024 37.836 56.7542C27.0165 61.0819 14.9472 61.0819 4.1277 56.7542C1.74801 55.8024 0.187571 53.4973 0.187571 50.9343L0.187535 45.7643C0.187065 42.7338 0.186775 40.8045 0.517639 39.1413Z"
                      fill="#035AE0"/>
                  <path
                      d="M49.913 13.5615C49.913 11.5642 48.2939 9.94508 46.2966 9.94508C44.2993 9.94508 42.6802 11.5642 42.6802 13.5615V17.1779H39.0638C37.0665 17.1779 35.4474 18.7969 35.4474 20.7943C35.4474 22.7916 37.0665 24.4106 39.0638 24.4106H42.6802V28.027C42.6802 30.0244 44.2993 31.6434 46.2966 31.6434C48.2939 31.6434 49.913 30.0244 49.913 28.027V24.4106H53.5294C55.5267 24.4106 57.1458 22.7916 57.1458 20.7943C57.1458 18.7969 55.5267 17.1779 53.5294 17.1779H49.913V13.5615Z"
                      fill="#035AE0"/>
                </svg>
              </span>
                    </div>
                    <div class="data-statistics-counter">
                        <h3 class="md:text-4xl text-2xl font-semibold text-black-200 mb-2">
                            <span class="counter-numbers">2 </span>k+
                        </h3>
                        <p class="text-lg">Members</p>
                    </div>
                </div>
                <div
                    class="data-statistics-item bg-white inline-block p-5 rounded shadow-lg  text-center md:border-r border-blue-20"
                    data-aos="fade-up" data-aos-delay="700">
                    <div class="data-statistics-logo ">
              <span>
                <svg class="m-auto mb-6" width="61" height="60" viewBox="0 0 61 60" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M51.5465 8.78676C45.8802 3.12046 38.3465 0 30.3333 0C22.32 0 14.7863 3.12046 9.12001 8.78676C3.45371 14.4531 0.333252 21.9868 0.333252 30C0.333252 38.0132 3.45371 45.5469 9.12001 51.2132C14.7863 56.8795 22.3199 60 30.3333 60C38.3466 60 45.8802 56.8795 51.5465 51.2132C57.2128 45.5469 60.3333 38.0133 60.3333 30C60.3333 21.9867 57.2128 14.4531 51.5465 8.78676ZM43.5923 27.2967C43.2933 28.0184 42.5891 28.489 41.808 28.489H36.8545V44.9173C36.8545 45.9839 35.9898 46.8486 34.9232 46.8486H25.7433C24.6767 46.8486 23.812 45.9839 23.812 44.9173V28.489H18.8584C18.0772 28.489 17.3731 28.0185 17.0741 27.2967C16.7753 26.575 16.9405 25.7443 17.4928 25.192L28.9676 13.7171C29.3298 13.3549 29.8209 13.1514 30.3331 13.1514C30.8453 13.1514 31.3366 13.3548 31.6987 13.7171L43.1734 25.192C43.7259 25.7443 43.8912 26.5749 43.5923 27.2967Z"
                      fill="#035AE0"/>
                </svg>
              </span>
                    </div>
                    <div class="data-statistics-counter">
                        <h3 class="md:text-4xl text-2xl font-semibold text-black-200 mb-2">
                            <span class="counter-numbers">1 </span>k+
                        </h3>
                        <p class="text-lg">Lesson Uploaded</p>
                    </div>
                </div>
                <div
                    class="data-statistics-item bg-white inline-block p-5 rounded shadow-lg  text-center md:border-r border-blue-20"
                    data-aos="fade-up" data-aos-delay="800">
                    <div class="data-statistics-logo ">
              <span>
                <svg class="m-auto mb-6" width="60" height="60" viewBox="0 0 60 60" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M29.9998 0C13.4313 0 -0.000244141 13.4315 -0.000244141 30C-0.000244141 46.5685 13.4313 60 29.9998 60C46.5684 60 59.9998 46.5685 59.9998 30C59.9998 13.4315 46.5683 0 29.9998 0ZM29.9998 49.4268L14.171 33.598H22.5658V13.0731H37.4339V33.598H45.8286L29.9998 49.4268Z"
                      fill="#035AE0"/>
                </svg>
              </span>
                    </div>
                    <div class="data-statistics-counter">
                        <h3 class="md:text-4xl text-2xl font-semibold text-black-200 mb-2">
                            <span class="counter-numbers">40 </span>k+
                        </h3>
                        <p class="text-lg">Topics Download</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
