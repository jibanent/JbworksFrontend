<template>
  <div id="page" class>
    <tasks-by-project-header :project="project" />

    <div id="project-master" class="simple scroll-y forced-scroll">
      <div class="canvas relative">
        <settings-menu :project="project" />

        <div id="setting">
          <div class="edit-box">
            <form method="POST" action="stt-hp-phong-cntt-112901/api/settings/edit">
              <div class="title">
                <span>Chỉnh sửa dự án</span>
              </div>

              <div class="box form" id="js-edit-form">
                <div class="row">
                  <div class="label">Tên dự án</div>
                  <div class="input">
                    <input type="text" placeholder="Tên" name="name" value="STT HP - Phòng CNTT" />
                  </div>
                </div>

                <div class="row">
                  <div class="label">Miêu tả chung</div>
                  <div class="input">
                    <textarea
                      name="content"
                      placeholder="Miêu tả"
                      data-autoexpand="1"
                      data-role="editor"
                      data-height="100"
                      data-minheight="100"
                      style="overflow: hidden scroll; overflow-wrap: break-word; display: none; height: 50px;"
                    ></textarea>
                    <div class="ql-toolbar ql-snow">
                      <span class="ql-formats">
                        <button type="button" class="ql-bold">
                          <svg viewBox="0 0 18 18">
                            <path
                              class="ql-stroke"
                              d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"
                            />
                            <path
                              class="ql-stroke"
                              d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"
                            />
                          </svg>
                        </button>
                        <button type="button" class="ql-italic">
                          <svg viewBox="0 0 18 18">
                            <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4" />
                            <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14" />
                            <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4" />
                          </svg>
                        </button>
                        <button type="button" class="ql-underline">
                          <svg viewBox="0 0 18 18">
                            <path
                              class="ql-stroke"
                              d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"
                            />
                            <rect
                              class="ql-fill"
                              height="1"
                              rx="0.5"
                              ry="0.5"
                              width="12"
                              x="3"
                              y="15"
                            />
                          </svg>
                        </button>
                        <button type="button" class="ql-strike">
                          <svg viewBox="0 0 18 18">
                            <line class="ql-stroke ql-thin" x1="15.5" x2="2.5" y1="8.5" y2="9.5" />
                            <path
                              class="ql-fill"
                              d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z"
                            />
                            <path
                              class="ql-fill"
                              d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z"
                            />
                          </svg>
                        </button>
                      </span>
                      <span class="ql-formats">
                        <button type="button" class="ql-blockquote">
                          <svg viewBox="0 0 18 18">
                            <rect class="ql-fill ql-stroke" height="3" width="3" x="4" y="5" />
                            <rect class="ql-fill ql-stroke" height="3" width="3" x="11" y="5" />
                            <path class="ql-even ql-fill ql-stroke" d="M7,8c0,4.031-3,5-3,5" />
                            <path class="ql-even ql-fill ql-stroke" d="M14,8c0,4.031-3,5-3,5" />
                          </svg>
                        </button>
                        <button type="button" class="ql-code-block">
                          <svg viewBox="0 0 18 18">
                            <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11" />
                            <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11" />
                            <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13" />
                          </svg>
                        </button>
                        <span class="ql-align ql-picker ql-icon-picker">
                          <span
                            class="ql-picker-label"
                            tabindex="0"
                            role="button"
                            aria-expanded="false"
                            aria-controls="ql-picker-options-3"
                            data-value
                          >
                            <svg viewBox="0 0 18 18">
                              <line class="ql-stroke" x1="3" x2="15" y1="9" y2="9" />
                              <line class="ql-stroke" x1="3" x2="13" y1="14" y2="14" />
                              <line class="ql-stroke" x1="3" x2="9" y1="4" y2="4" />
                            </svg>
                          </span>
                          <span
                            class="ql-picker-options"
                            aria-hidden="true"
                            tabindex="-1"
                            id="ql-picker-options-3"
                          >
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-selected"
                              data-value
                            >
                              <svg viewBox="0 0 18 18">
                                <line class="ql-stroke" x1="3" x2="15" y1="9" y2="9" />
                                <line class="ql-stroke" x1="3" x2="13" y1="14" y2="14" />
                                <line class="ql-stroke" x1="3" x2="9" y1="4" y2="4" />
                              </svg>
                            </span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="center"
                            >
                              <svg viewBox="0 0 18 18">
                                <line class="ql-stroke" x1="15" x2="3" y1="9" y2="9" />
                                <line class="ql-stroke" x1="14" x2="4" y1="14" y2="14" />
                                <line class="ql-stroke" x1="12" x2="6" y1="4" y2="4" />
                              </svg>
                            </span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="right"
                            >
                              <svg viewBox="0 0 18 18">
                                <line class="ql-stroke" x1="15" x2="3" y1="9" y2="9" />
                                <line class="ql-stroke" x1="15" x2="5" y1="14" y2="14" />
                                <line class="ql-stroke" x1="15" x2="9" y1="4" y2="4" />
                              </svg>
                            </span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="justify"
                            >
                              <svg viewBox="0 0 18 18">
                                <line class="ql-stroke" x1="15" x2="3" y1="9" y2="9" />
                                <line class="ql-stroke" x1="15" x2="3" y1="14" y2="14" />
                                <line class="ql-stroke" x1="15" x2="3" y1="4" y2="4" />
                              </svg>
                            </span>
                          </span>
                        </span>
                        <select class="ql-align" style="display: none;">
                          <option value></option>
                          <option value="center"></option>
                          <option value="right"></option>
                          <option value="justify"></option>
                        </select>
                      </span>
                      <span class="ql-formats">
                        <button type="button" class="ql-header" value="1">
                          <svg viewBox="0 0 18 18">
                            <path
                              class="ql-fill"
                              d="M10,4V14a1,1,0,0,1-2,0V10H3v4a1,1,0,0,1-2,0V4A1,1,0,0,1,3,4V8H8V4a1,1,0,0,1,2,0Zm6.06787,9.209H14.98975V7.59863a.54085.54085,0,0,0-.605-.60547h-.62744a1.01119,1.01119,0,0,0-.748.29688L11.645,8.56641a.5435.5435,0,0,0-.022.8584l.28613.30762a.53861.53861,0,0,0,.84717.0332l.09912-.08789a1.2137,1.2137,0,0,0,.2417-.35254h.02246s-.01123.30859-.01123.60547V13.209H12.041a.54085.54085,0,0,0-.605.60547v.43945a.54085.54085,0,0,0,.605.60547h4.02686a.54085.54085,0,0,0,.605-.60547v-.43945A.54085.54085,0,0,0,16.06787,13.209Z"
                            />
                          </svg>
                        </button>
                        <button type="button" class="ql-header" value="2">
                          <svg viewBox="0 0 18 18">
                            <path
                              class="ql-fill"
                              d="M16.73975,13.81445v.43945a.54085.54085,0,0,1-.605.60547H11.855a.58392.58392,0,0,1-.64893-.60547V14.0127c0-2.90527,3.39941-3.42187,3.39941-4.55469a.77675.77675,0,0,0-.84717-.78125,1.17684,1.17684,0,0,0-.83594.38477c-.2749.26367-.561.374-.85791.13184l-.4292-.34082c-.30811-.24219-.38525-.51758-.1543-.81445a2.97155,2.97155,0,0,1,2.45361-1.17676,2.45393,2.45393,0,0,1,2.68408,2.40918c0,2.45312-3.1792,2.92676-3.27832,3.93848h2.79443A.54085.54085,0,0,1,16.73975,13.81445ZM9,3A.99974.99974,0,0,0,8,4V8H3V4A1,1,0,0,0,1,4V14a1,1,0,0,0,2,0V10H8v4a1,1,0,0,0,2,0V4A.99974.99974,0,0,0,9,3Z"
                            />
                          </svg>
                        </button>
                      </span>
                      <span class="ql-formats">
                        <button type="button" class="ql-list" value="ordered">
                          <svg viewBox="0 0 18 18">
                            <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4" />
                            <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9" />
                            <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14" />
                            <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5" />
                            <path
                              class="ql-fill"
                              d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"
                            />
                            <path
                              class="ql-stroke ql-thin"
                              d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"
                            />
                            <path
                              class="ql-stroke ql-thin"
                              d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"
                            />
                          </svg>
                        </button>
                        <button type="button" class="ql-list" value="bullet">
                          <svg viewBox="0 0 18 18">
                            <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4" />
                            <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9" />
                            <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14" />
                            <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4" />
                            <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9" />
                            <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14" />
                          </svg>
                        </button>
                      </span>
                      <span class="ql-formats">
                        <button type="button" class="ql-script" value="sub">
                          <svg viewBox="0 0 18 18">
                            <path
                              class="ql-fill"
                              d="M15.5,15H13.861a3.858,3.858,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.921,1.921,0,0,0,12.021,11.7a0.50013,0.50013,0,1,0,.957.291h0a0.914,0.914,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.076-1.16971,1.86982-1.93971,2.43082A1.45639,1.45639,0,0,0,12,15.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,15Z"
                            />
                            <path
                              class="ql-fill"
                              d="M9.65,5.241a1,1,0,0,0-1.409.108L6,7.964,3.759,5.349A1,1,0,0,0,2.192,6.59178Q2.21541,6.6213,2.241,6.649L4.684,9.5,2.241,12.35A1,1,0,0,0,3.71,13.70722q0.02557-.02768.049-0.05722L6,11.036,8.241,13.65a1,1,0,1,0,1.567-1.24277Q9.78459,12.3777,9.759,12.35L7.316,9.5,9.759,6.651A1,1,0,0,0,9.65,5.241Z"
                            />
                          </svg>
                        </button>
                        <button type="button" class="ql-script" value="super">
                          <svg viewBox="0 0 18 18">
                            <path
                              class="ql-fill"
                              d="M15.5,7H13.861a4.015,4.015,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.922,1.922,0,0,0,12.021,3.7a0.5,0.5,0,1,0,.957.291,0.917,0.917,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.077-1.164,1.925-1.934,2.486A1.423,1.423,0,0,0,12,7.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,7Z"
                            />
                            <path
                              class="ql-fill"
                              d="M9.651,5.241a1,1,0,0,0-1.41.108L6,7.964,3.759,5.349a1,1,0,1,0-1.519,1.3L4.683,9.5,2.241,12.35a1,1,0,1,0,1.519,1.3L6,11.036,8.241,13.65a1,1,0,0,0,1.519-1.3L7.317,9.5,9.759,6.651A1,1,0,0,0,9.651,5.241Z"
                            />
                          </svg>
                        </button>
                      </span>
                      <span class="ql-formats">
                        <button type="button" class="ql-link">
                          <svg viewBox="0 0 18 18">
                            <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11" />
                            <path
                              class="ql-even ql-stroke"
                              d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"
                            />
                            <path
                              class="ql-even ql-stroke"
                              d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"
                            />
                          </svg>
                        </button>
                        <button type="button" class="ql-image">
                          <svg viewBox="0 0 18 18">
                            <rect class="ql-stroke" height="10" width="12" x="3" y="4" />
                            <circle class="ql-fill" cx="6" cy="7" r="1" />
                            <polyline
                              class="ql-even ql-fill"
                              points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"
                            />
                          </svg>
                        </button>
                      </span>
                      <span class="ql-formats">
                        <span class="ql-color ql-picker ql-color-picker">
                          <span
                            class="ql-picker-label"
                            tabindex="0"
                            role="button"
                            aria-expanded="false"
                            aria-controls="ql-picker-options-4"
                          >
                            <svg viewBox="0 0 18 18">
                              <line
                                class="ql-color-label ql-stroke ql-transparent"
                                x1="3"
                                x2="15"
                                y1="15"
                                y2="15"
                              />
                              <polyline class="ql-stroke" points="5.5 11 9 3 12.5 11" />
                              <line class="ql-stroke" x1="11.63" x2="6.38" y1="9" y2="9" />
                            </svg>
                          </span>
                          <span
                            class="ql-picker-options"
                            aria-hidden="true"
                            tabindex="-1"
                            id="ql-picker-options-4"
                          >
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-selected ql-primary"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#e60000"
                              style="background-color: rgb(230, 0, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#ff9900"
                              style="background-color: rgb(255, 153, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#ffff00"
                              style="background-color: rgb(255, 255, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#008a00"
                              style="background-color: rgb(0, 138, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#0066cc"
                              style="background-color: rgb(0, 102, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#9933ff"
                              style="background-color: rgb(153, 51, 255);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ffffff"
                              style="background-color: rgb(255, 255, 255);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#facccc"
                              style="background-color: rgb(250, 204, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ffebcc"
                              style="background-color: rgb(255, 235, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ffffcc"
                              style="background-color: rgb(255, 255, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#cce8cc"
                              style="background-color: rgb(204, 232, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#cce0f5"
                              style="background-color: rgb(204, 224, 245);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ebd6ff"
                              style="background-color: rgb(235, 214, 255);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#bbbbbb"
                              style="background-color: rgb(187, 187, 187);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#f06666"
                              style="background-color: rgb(240, 102, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ffc266"
                              style="background-color: rgb(255, 194, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ffff66"
                              style="background-color: rgb(255, 255, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#66b966"
                              style="background-color: rgb(102, 185, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#66a3e0"
                              style="background-color: rgb(102, 163, 224);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#c285ff"
                              style="background-color: rgb(194, 133, 255);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#888888"
                              style="background-color: rgb(136, 136, 136);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#a10000"
                              style="background-color: rgb(161, 0, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#b26b00"
                              style="background-color: rgb(178, 107, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#b2b200"
                              style="background-color: rgb(178, 178, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#006100"
                              style="background-color: rgb(0, 97, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#0047b2"
                              style="background-color: rgb(0, 71, 178);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#6b24b2"
                              style="background-color: rgb(107, 36, 178);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#444444"
                              style="background-color: rgb(68, 68, 68);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#5c0000"
                              style="background-color: rgb(92, 0, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#663d00"
                              style="background-color: rgb(102, 61, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#666600"
                              style="background-color: rgb(102, 102, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#003700"
                              style="background-color: rgb(0, 55, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#002966"
                              style="background-color: rgb(0, 41, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#3d1466"
                              style="background-color: rgb(61, 20, 102);"
                            ></span>
                          </span>
                        </span>
                        <select class="ql-color" style="display: none;">
                          <option selected="selected"></option>
                          <option value="#e60000"></option>
                          <option value="#ff9900"></option>
                          <option value="#ffff00"></option>
                          <option value="#008a00"></option>
                          <option value="#0066cc"></option>
                          <option value="#9933ff"></option>
                          <option value="#ffffff"></option>
                          <option value="#facccc"></option>
                          <option value="#ffebcc"></option>
                          <option value="#ffffcc"></option>
                          <option value="#cce8cc"></option>
                          <option value="#cce0f5"></option>
                          <option value="#ebd6ff"></option>
                          <option value="#bbbbbb"></option>
                          <option value="#f06666"></option>
                          <option value="#ffc266"></option>
                          <option value="#ffff66"></option>
                          <option value="#66b966"></option>
                          <option value="#66a3e0"></option>
                          <option value="#c285ff"></option>
                          <option value="#888888"></option>
                          <option value="#a10000"></option>
                          <option value="#b26b00"></option>
                          <option value="#b2b200"></option>
                          <option value="#006100"></option>
                          <option value="#0047b2"></option>
                          <option value="#6b24b2"></option>
                          <option value="#444444"></option>
                          <option value="#5c0000"></option>
                          <option value="#663d00"></option>
                          <option value="#666600"></option>
                          <option value="#003700"></option>
                          <option value="#002966"></option>
                          <option value="#3d1466"></option>
                        </select>
                        <span class="ql-background ql-picker ql-color-picker">
                          <span
                            class="ql-picker-label"
                            tabindex="0"
                            role="button"
                            aria-expanded="false"
                            aria-controls="ql-picker-options-5"
                          >
                            <svg viewBox="0 0 18 18">
                              <g class="ql-fill ql-color-label">
                                <polygon points="6 6.868 6 6 5 6 5 7 5.942 7 6 6.868" />
                                <rect height="1" width="1" x="4" y="4" />
                                <polygon points="6.817 5 6 5 6 6 6.38 6 6.817 5" />
                                <rect height="1" width="1" x="2" y="6" />
                                <rect height="1" width="1" x="3" y="5" />
                                <rect height="1" width="1" x="4" y="7" />
                                <polygon points="4 11.439 4 11 3 11 3 12 3.755 12 4 11.439" />
                                <rect height="1" width="1" x="2" y="12" />
                                <rect height="1" width="1" x="2" y="9" />
                                <rect height="1" width="1" x="2" y="15" />
                                <polygon points="4.63 10 4 10 4 11 4.192 11 4.63 10" />
                                <rect height="1" width="1" x="3" y="8" />
                                <path
                                  d="M10.832,4.2L11,4.582V4H10.708A1.948,1.948,0,0,1,10.832,4.2Z"
                                />
                                <path d="M7,4.582L7.168,4.2A1.929,1.929,0,0,1,7.292,4H7V4.582Z" />
                                <path d="M8,13H7.683l-0.351.8a1.933,1.933,0,0,1-.124.2H8V13Z" />
                                <rect height="1" width="1" x="12" y="2" />
                                <rect height="1" width="1" x="11" y="3" />
                                <path d="M9,3H8V3.282A1.985,1.985,0,0,1,9,3Z" />
                                <rect height="1" width="1" x="2" y="3" />
                                <rect height="1" width="1" x="6" y="2" />
                                <rect height="1" width="1" x="3" y="2" />
                                <rect height="1" width="1" x="5" y="3" />
                                <rect height="1" width="1" x="9" y="2" />
                                <rect height="1" width="1" x="15" y="14" />
                                <polygon
                                  points="13.447 10.174 13.469 10.225 13.472 10.232 13.808 11 14 11 14 10 13.37 10 13.447 10.174"
                                />
                                <rect height="1" width="1" x="13" y="7" />
                                <rect height="1" width="1" x="15" y="5" />
                                <rect height="1" width="1" x="14" y="6" />
                                <rect height="1" width="1" x="15" y="8" />
                                <rect height="1" width="1" x="14" y="9" />
                                <path d="M3.775,14H3v1H4V14.314A1.97,1.97,0,0,1,3.775,14Z" />
                                <rect height="1" width="1" x="14" y="3" />
                                <polygon points="12 6.868 12 6 11.62 6 12 6.868" />
                                <rect height="1" width="1" x="15" y="2" />
                                <rect height="1" width="1" x="12" y="5" />
                                <rect height="1" width="1" x="13" y="4" />
                                <polygon points="12.933 9 13 9 13 8 12.495 8 12.933 9" />
                                <rect height="1" width="1" x="9" y="14" />
                                <rect height="1" width="1" x="8" y="15" />
                                <path d="M6,14.926V15H7V14.316A1.993,1.993,0,0,1,6,14.926Z" />
                                <rect height="1" width="1" x="5" y="15" />
                                <path
                                  d="M10.668,13.8L10.317,13H10v1h0.792A1.947,1.947,0,0,1,10.668,13.8Z"
                                />
                                <rect height="1" width="1" x="11" y="15" />
                                <path d="M14.332,12.2a1.99,1.99,0,0,1,.166.8H15V12H14.245Z" />
                                <rect height="1" width="1" x="14" y="15" />
                                <rect height="1" width="1" x="15" y="11" />
                              </g>
                              <polyline class="ql-stroke" points="5.5 13 9 5 12.5 13" />
                              <line class="ql-stroke" x1="11.63" x2="6.38" y1="11" y2="11" />
                            </svg>
                          </span>
                          <span
                            class="ql-picker-options"
                            aria-hidden="true"
                            tabindex="-1"
                            id="ql-picker-options-5"
                          >
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#000000"
                              style="background-color: rgb(0, 0, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#e60000"
                              style="background-color: rgb(230, 0, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#ff9900"
                              style="background-color: rgb(255, 153, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#ffff00"
                              style="background-color: rgb(255, 255, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#008a00"
                              style="background-color: rgb(0, 138, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#0066cc"
                              style="background-color: rgb(0, 102, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item ql-primary"
                              data-value="#9933ff"
                              style="background-color: rgb(153, 51, 255);"
                            ></span>
                            <span tabindex="0" role="button" class="ql-picker-item ql-selected"></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#facccc"
                              style="background-color: rgb(250, 204, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ffebcc"
                              style="background-color: rgb(255, 235, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ffffcc"
                              style="background-color: rgb(255, 255, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#cce8cc"
                              style="background-color: rgb(204, 232, 204);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#cce0f5"
                              style="background-color: rgb(204, 224, 245);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ebd6ff"
                              style="background-color: rgb(235, 214, 255);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#bbbbbb"
                              style="background-color: rgb(187, 187, 187);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#f06666"
                              style="background-color: rgb(240, 102, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ffc266"
                              style="background-color: rgb(255, 194, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#ffff66"
                              style="background-color: rgb(255, 255, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#66b966"
                              style="background-color: rgb(102, 185, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#66a3e0"
                              style="background-color: rgb(102, 163, 224);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#c285ff"
                              style="background-color: rgb(194, 133, 255);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#888888"
                              style="background-color: rgb(136, 136, 136);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#a10000"
                              style="background-color: rgb(161, 0, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#b26b00"
                              style="background-color: rgb(178, 107, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#b2b200"
                              style="background-color: rgb(178, 178, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#006100"
                              style="background-color: rgb(0, 97, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#0047b2"
                              style="background-color: rgb(0, 71, 178);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#6b24b2"
                              style="background-color: rgb(107, 36, 178);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#444444"
                              style="background-color: rgb(68, 68, 68);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#5c0000"
                              style="background-color: rgb(92, 0, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#663d00"
                              style="background-color: rgb(102, 61, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#666600"
                              style="background-color: rgb(102, 102, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#003700"
                              style="background-color: rgb(0, 55, 0);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#002966"
                              style="background-color: rgb(0, 41, 102);"
                            ></span>
                            <span
                              tabindex="0"
                              role="button"
                              class="ql-picker-item"
                              data-value="#3d1466"
                              style="background-color: rgb(61, 20, 102);"
                            ></span>
                          </span>
                        </span>
                        <select class="ql-background" style="display: none;">
                          <option value="#000000"></option>
                          <option value="#e60000"></option>
                          <option value="#ff9900"></option>
                          <option value="#ffff00"></option>
                          <option value="#008a00"></option>
                          <option value="#0066cc"></option>
                          <option value="#9933ff"></option>
                          <option selected="selected"></option>
                          <option value="#facccc"></option>
                          <option value="#ffebcc"></option>
                          <option value="#ffffcc"></option>
                          <option value="#cce8cc"></option>
                          <option value="#cce0f5"></option>
                          <option value="#ebd6ff"></option>
                          <option value="#bbbbbb"></option>
                          <option value="#f06666"></option>
                          <option value="#ffc266"></option>
                          <option value="#ffff66"></option>
                          <option value="#66b966"></option>
                          <option value="#66a3e0"></option>
                          <option value="#c285ff"></option>
                          <option value="#888888"></option>
                          <option value="#a10000"></option>
                          <option value="#b26b00"></option>
                          <option value="#b2b200"></option>
                          <option value="#006100"></option>
                          <option value="#0047b2"></option>
                          <option value="#6b24b2"></option>
                          <option value="#444444"></option>
                          <option value="#5c0000"></option>
                          <option value="#663d00"></option>
                          <option value="#666600"></option>
                          <option value="#003700"></option>
                          <option value="#002966"></option>
                          <option value="#3d1466"></option>
                        </select>
                      </span>
                      <span class="ql-formats">
                        <button type="button" class="ql-clean">
                          <svg class viewBox="0 0 18 18">
                            <line class="ql-stroke" x1="5" x2="13" y1="3" y2="3" />
                            <line class="ql-stroke" x1="6" x2="9.35" y1="12" y2="3" />
                            <line class="ql-stroke" x1="11" x2="15" y1="11" y2="15" />
                            <line class="ql-stroke" x1="15" x2="11" y1="11" y2="15" />
                            <rect
                              class="ql-fill"
                              height="1"
                              rx="0.5"
                              ry="0.5"
                              width="7"
                              x="2"
                              y="14"
                            />
                          </svg>
                        </button>
                      </span>
                    </div>
                    <div
                      id="_uuid95206_45622_1588747229"
                      class="quill-wrapper ql-container ql-snow"
                      style="height:100px"
                    >
                      <div
                        class="ql-editor ql-blank"
                        data-gramm="false"
                        contenteditable="true"
                        data-placeholder="Miêu tả"
                        spellcheck="false"
                        style="min-height: 100px;"
                      >
                        <p>
                          <br />
                        </p>
                      </div>
                      <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                      <div class="ql-tooltip ql-hidden">
                        <a class="ql-preview" target="_blank" href="about:blank"></a>
                        <input
                          type="text"
                          data-formula="e=mc^2"
                          data-link="https://quilljs.com"
                          data-video="Embed URL"
                        />
                        <a class="ql-action"></a>
                        <a class="ql-remove"></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="label">Phân loại</div>
                  <div class="select editable">
                    <select name="external" data-value="0">
                      <option value="0">Dự án nội bộ (chỉ dành cho các thành viên trong công ty)</option>
                      <option value="1">Dự án làm việc với khách hàng</option>
                    </select>
                  </div>

                  <div class="sep-10"></div>

                  <div class="select editable">
                    <select name="percent_completion" data-value="0">
                      <option value="1">Cho phép hoàn thành phần trăm công việc</option>
                      <option value="0">Không cho phép hoàn thành phần trăm công việc</option>
                    </select>
                  </div>

                  <div class="sep-10"></div>

                  <div class="select editable">
                    <select name="task_duration" data-value="0">
                      <option value="1">Cho phép thời lượng công việc dự kiến</option>
                      <option value="0">Không cho phép thời lượng công việc dự kiến</option>
                    </select>
                  </div>

                  <div class="sep-10"></div>

                  <div class="select editable">
                    <select name="deadline_has_time" data-value="0">
                      <option value="0">Thời hạn công việc (cuối ngày)</option>
                      <option value="1">Thời hạn công việc với ngày giờ cụ thể</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="label">Trạng thái hiện tại</div>
                  <div class="select editable">
                    <select name="status" data-value="0">
                      <option value="0">Đang thực hiện</option>
                      <option value="-1">Đóng</option>
                    </select>
                  </div>

                  <div class="sep-10"></div>

                  <div class="select editable">
                    <select name="stage" id="js-stage-opt" data-value="ontrack">
                      <option value="ontrack">Đúng tiến độ</option>
                      <option value="offtrack">Chậm tiến độ</option>
                      <option value="atrisk">Có rủi ro cao</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="label">Yêu cầu đánh giá trước khi đánh dấu hoàn thành công việc</div>
                  <div class="select editable">
                    <select name="review" data-value="1">
                      <option value="0">Không yêu cầu</option>
                      <option value="1">Yêu cầu đánh giá</option>
                    </select>
                  </div>

                  <div class="select js-review hidden" style="display: block;">
                    <div class="sep-10"></div>
                    <select name="review_by_assigner" data-value="0">
                      <option value="1">Automatically allow assigneer to review</option>
                      <option value="0">Do not automatically let assigneer to review</option>
                    </select>
                  </div>

                  <div class="input js-review hidden" style="display: block;">
                    <div class="sep-10"></div>
                    <input
                      type="text"
                      placeholder="Thành viên giám sát (project-team managers tự động có quyền giám sát)"
                      name="reviewers"
                      value
                      data-role="tag"
                      autocomplete="off"
                      class="__autoc __autoresized"
                      id="_uuid12805_21826_1588747229"
                      style="overflow: hidden;"
                    />
                  </div>
                </div>

                <div class="on-edit">
                  <div class="button -cta">Lưu</div>
                  <div class="button -cancel">Hủy</div>
                </div>
              </div>
            </form>
          </div>

          <div class="edit-box">
            <form method="POST" action="stt-hp-phong-cntt-112901/api/settings/edit.dept">
              <div class="title">Phòng ban</div>

              <div class="box form" id="js-edit-dept-form">
                <div class="row">
                  <div class="select">
                    <select name="dept_id" data-value="0">
                      <option value="0">Chưa chọn</option>
                      <option value="1336">Marketing</option>
                      <option value="1278">BỆNH VIỆN</option>
                      <option value="1277">THÔNG TIN</option>
                      <option value="1276">TRUNG TÂM THƯƠNG MẠI</option>
                      <option value="1275">DỰ ÁN CÔNG NGHIỆP</option>
                      <option value="1218">Nhà mát Vina</option>
                      <option value="1215">2020 - Dự án</option>
                      <option value="1195">phòng tài chính</option>
                      <option value="1194">Quản lý khách hàng</option>
                      <option value="1193">Dự án thi công, xây dựng</option>
                      <option value="1166">Công ty Ogandi</option>
                      <option value="1128">DSDA Cty thiết bị ABB</option>
                      <option value="1093">TestEverpia</option>
                      <option value="1064">Trung tâm Quang Điện Tử</option>
                      <option value="1059">Phòng Công Nghệ</option>
                      <option value="999">DSDA Cty WTG</option>
                      <option value="998">Eurohomes</option>
                      <option value="997">Sawadika</option>
                      <option value="996">Khối cửa hàng</option>
                      <option value="990">Quản lí lớp học</option>
                      <option value="989">Tedi</option>
                      <option value="936">Mua hàng</option>
                      <option value="913">Back Office</option>
                      <option value="900">Phòng Lập Trình</option>
                      <option value="888">HR</option>
                      <option value="883">PHÒNG BAN DEMO</option>
                      <option value="874">Multispace</option>
                      <option value="822">Royal</option>
                      <option value="745">Tiến độ Sông Đuống</option>
                      <option value="708">Quản lý kỹ thuât</option>
                      <option value="707">Công ty xây dựng</option>
                      <option value="706">Trường cấp 3</option>
                      <option value="695">Phòng CNTT</option>
                      <option value="690">Viettin Bank</option>
                      <option value="677">Tòa soạn báo</option>
                      <option value="675">Phòng nghiệp vụ</option>
                      <option value="674">Phòng ban</option>
                      <option value="669">KSTD DA1</option>
                      <option value="565">Departments</option>
                      <option value="564">Projects</option>
                      <option value="537">CHI NHÁNH</option>
                      <option value="495">Phòng QLCL</option>
                      <option value="442">DSDA Cty PETROVIETNAM GAS</option>
                      <option value="426">Trường mầm non Mặt Trời</option>
                      <option value="415">Cơ sở D8</option>
                      <option value="360">03 - Phòng ban</option>
                      <option value="359">Phòng công nghệ thông tin</option>
                      <option value="347">Cơ sở Fitness Nguyễn Trãi</option>
                      <option value="346">Cơ sở Fitness Láng</option>
                      <option value="341">Dự án mẫu</option>
                      <option value="331">HỘI ĐỒNG QUẢN TRỊ</option>
                      <option value="330">CÔNG TY C</option>
                      <option value="329">CÔNG TY B</option>
                      <option value="328">CÔNG TY A</option>
                      <option value="166">PHÒNG THI CÔNG</option>
                      <option value="164">Phòng Hành Chính Nhân Sự</option>
                      <option value="148">Test</option>
                      <option value="125">Solar power</option>
                      <option value="104">Phòng Hành Chính NS</option>
                      <option value="97">BOD</option>
                      <option value="95">BOD</option>
                      <option value="89">Phòng thiết kế</option>
                      <option value="69">HN</option>
                      <option value="67">Phòng Đào tạo</option>
                      <option value="49">PHÒNG BAN</option>
                      <option value="48">DỰ ÁN</option>
                      <option value="40">Phòng Kế toán</option>
                      <option value="29">Phòng kế hoạch</option>
                      <option value="5">Phòng Nhân sự</option>
                    </select>
                  </div>
                </div>

                <div class="on-edit">
                  <div class="button -cta">Lưu</div>
                  <div class="button -cancel">Hủy</div>
                </div>
              </div>
            </form>
          </div>

          <div class="edit-box">
            <div class="title">
              <span>Thời gian thực hiện</span>
            </div>

            <div class="box form">
              <div class="period">
                <div id="js-project-period">
                  <span class="a">Đặt thời gian bắt đầu và kết thúc dự án</span>
                </div>
              </div>
            </div>
          </div>

          <div class="edit-box">
            <div class="title">
              <span>Màu sắc hiển thị</span>
            </div>

            <div class="box form">
              <div class="colors" id="js-edit-colors">
                <div class="color -bg-alt0" data-color="0"></div>
                <div class="color -bg-alt1 active" data-color="1"></div>
                <div class="color -bg-alt2" data-color="2"></div>
                <div class="color -bg-alt3" data-color="3"></div>
                <div class="color -bg-alt4" data-color="4"></div>
                <div class="color -bg-alt5" data-color="5"></div>
                <div class="color -bg-alt6" data-color="6"></div>
                <div class="color -bg-alt7" data-color="7"></div>
                <div class="color -bg-alt8" data-color="8"></div>
                <div class="color -bg-alt9" data-color="9"></div>
                <div class="color -bg-alt10" data-color="10"></div>
              </div>
            </div>
          </div>

          <div class="edit-box">
            <div class="title">
              <span>Danh sách nhãn</span>
            </div>

            <div class="box form">
              <div class="tags" id="js-edit-tags">
                <div class="list"></div>

                <div class="tag-add">
                  <form method="POST" action="stt-hp-phong-cntt-112901/api/settings/tags/edit">
                    <div class="square ap-inline-colors-wrap unselectable">
                      <em class="-bg-alt0"></em>
                      <div class="ap-inline-colors">
                        <div class="apir"></div>
                        <div class="ap-inline-title">Select color</div>
                        <div class="ap-inline-box">
                          <div class="ap-color -bg-alt0" data-color="0"></div>
                          <div class="ap-color -bg-alt1" data-color="1"></div>
                          <div class="ap-color -bg-alt2" data-color="2"></div>
                          <div class="ap-color -bg-alt3" data-color="3"></div>
                          <div class="ap-color -bg-alt4" data-color="4"></div>
                          <div class="ap-color -bg-alt5" data-color="5"></div>
                          <div class="ap-color -bg-alt6" data-color="6"></div>
                          <div class="ap-color -bg-alt7" data-color="7"></div>
                          <div class="ap-color -bg-alt8" data-color="8"></div>
                          <div class="ap-color -bg-alt9" data-color="9"></div>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="color" value="0" />

                    <div class="ip">
                      <input
                        type="text"
                        name="name"
                        placeholder="Thêm nhãn mới"
                        class="__ap_enter_binded"
                      />
                    </div>
                    <div class="submit">Cập nhật</div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div id="js-proj-settings" class="__sts">
            <div class="setting-box is-checkbox" id="_uuid75122_48305_1588747229">
              <div class="title">Default view</div>
              <div class="values">
                <div class="hidden">
                  <input type="hidden" name="view" />
                </div>
                <div
                  class="st-opt selected"
                  data-url="stt-hp-phong-cntt-112901/api/settings/pref"
                  data-name="view"
                  data-value="list"
                >List view (default)</div>
                <div
                  class="st-opt"
                  data-url="stt-hp-phong-cntt-112901/api/settings/pref"
                  data-name="view"
                  data-value="table"
                >Table view with Gantt</div>
                <div
                  class="st-opt"
                  data-url="stt-hp-phong-cntt-112901/api/settings/pref"
                  data-name="view"
                  data-value="board"
                >Board (kanban) view</div>
              </div>
            </div>
          </div>

          <div class="edit-box">
            <div class="title">
              <span>Thông tin hệ thống</span>
            </div>

            <div class="box form -inline">
              <div class="row">
                <div class="label">Package</div>
                <div class="value">wework.growth</div>
              </div>

              <div class="row">
                <div class="label">Expired date</div>
                <div class="value">31-12-2025</div>
              </div>
            </div>
          </div>

          <div class="fx">© Base Wework 2018</div>

          <div class="sep-20"></div>
          <div class="sep-20"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TasksByProjectHeader from "../tasks/TasksByProjectHeader";
import SettingsMenu from './SettingsMenu'
import { mapActions, mapState } from "vuex";
export default {
  name: "project-editing",
  created() {
    const projectId = this.$route.params.id;
    this.getTasksByProject(projectId);
  },
  methods: {
    ...mapActions(["getTasksByProject"])
  },
  computed: {
    ...mapState({
      project: state => state.projects.project
    })
  },
  components: {
    TasksByProjectHeader,
    SettingsMenu
  }
};
</script>

<style>
</style>
