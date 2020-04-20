<template>
  <div class="box std" data-col="4,3" style="width: 40%;">
    <div class="inner">
      <div class="header">
        Phân bổ công việc theo phòng ban
        <div class="side"></div>
      </div>
      <div class="body">
        <div
          class="body -fit"
          id="js-dept-task-allocation"
          data-highcharts-chart="4"
          style="overflow: hidden;"
        >
          <div
            id="highcharts-gmti7yu-130"
            dir="ltr"
            class="highcharts-container"
            style="position: relative; overflow: hidden; width: 475px; height: 315px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
          >
            <svg
              version="1.1"
              class="highcharts-root"
              style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;"
              xmlns="http://www.w3.org/2000/svg"
              width="475"
              height="315"
              viewBox="0 0 475 315"
            >
              <desc>Created with Highcharts 7.2.1</desc>
              <defs>
                <clipPath id="highcharts-gmti7yu-131-">
                  <rect x="0" y="0" width="391" height="154" fill="none" />
                </clipPath>
              </defs>
              <rect
                fill="#ffffff"
                class="highcharts-background"
                x="0"
                y="0"
                width="475"
                height="315"
                rx="0"
                ry="0"
              />
              <rect
                fill="none"
                class="highcharts-plot-background"
                x="74"
                y="10"
                width="391"
                height="154"
              />
              <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1">
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 112.5 10 L 112.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 151.5 10 L 151.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 190.5 10 L 190.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 229.5 10 L 229.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 269.5 10 L 269.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 308.5 10 L 308.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 347.5 10 L 347.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 386.5 10 L 386.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 425.5 10 L 425.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 464.5 10 L 464.5 164"
                  opacity="1"
                />
                <path
                  fill="none"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 73.5 10 L 73.5 164"
                  opacity="1"
                />
              </g>
              <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1">
                <path
                  fill="none"
                  stroke="#e6e6e6"
                  stroke-width="1"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 74 164.5 L 465 164.5"
                  opacity="1"
                />
                <path
                  fill="none"
                  stroke="#e6e6e6"
                  stroke-width="1"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 74 87.5 L 465 87.5"
                  opacity="1"
                />
                <path
                  fill="none"
                  stroke="#e6e6e6"
                  stroke-width="1"
                  data-z-index="1"
                  class="highcharts-grid-line"
                  d="M 74 9.5 L 465 9.5"
                  opacity="1"
                />
              </g>
              <rect
                fill="none"
                class="highcharts-plot-border"
                data-z-index="1"
                x="74"
                y="10"
                width="391"
                height="154"
              />
              <g class="highcharts-axis highcharts-xaxis" data-z-index="2">
                <path
                  fill="none"
                  class="highcharts-axis-line"
                  stroke="#ccd6eb"
                  stroke-width="1"
                  data-z-index="7"
                  d="M 74 164.5 L 465 164.5"
                />
              </g>
              <g class="highcharts-axis highcharts-yaxis" data-z-index="2">
                <text
                  x="26.078125"
                  data-z-index="7"
                  text-anchor="middle"
                  transform="translate(0,0) rotate(270 26.078125 87)"
                  class="highcharts-axis-title"
                  style="color:#666666;fill:#666666;"
                  y="87"
                >
                  <tspan>Số lượng công việc</tspan>
                </text>
                <path
                  fill="none"
                  class="highcharts-axis-line"
                  data-z-index="7"
                  d="M 74 10 L 74 164"
                />
              </g>
              <g class="highcharts-series-group" data-z-index="3">
                <g
                  data-z-index="0.1"
                  class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-color-0 highcharts-tracker"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="url(#highcharts-gmti7yu-131-)"
                  opacity="1"
                >
                  <rect
                    x="7.5"
                    y="22.5"
                    width="4"
                    height="132"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                  <rect
                    x="46.5"
                    y="108.5"
                    width="4"
                    height="46"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                  <rect
                    x="85.5"
                    y="148.5"
                    width="4"
                    height="6"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                  <rect
                    x="125.5"
                    y="137.5"
                    width="4"
                    height="17"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                  <rect
                    x="164.5"
                    y="121.5"
                    width="4"
                    height="33"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                  <rect
                    x="203.5"
                    y="149.5"
                    width="4"
                    height="5"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                  <rect
                    x="242.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                  <rect
                    x="281.5"
                    y="149.5"
                    width="4"
                    height="5"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                  <rect
                    x="320.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                  <rect
                    x="359.5"
                    y="151.5"
                    width="4"
                    height="3"
                    fill="#7cb5ec"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-0"
                  />
                </g>
                <g
                  data-z-index="0.1"
                  class="highcharts-markers highcharts-series-0 highcharts-column-series highcharts-color-0"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="none"
                  opacity="1"
                />
                <g
                  data-z-index="0.1"
                  class="highcharts-series highcharts-series-1 highcharts-column-series highcharts-color-1 highcharts-tracker"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="url(#highcharts-gmti7yu-131-)"
                  opacity="1"
                >
                  <rect
                    x="12.5"
                    y="101.5"
                    width="4"
                    height="53"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                  <rect
                    x="51.5"
                    y="142.5"
                    width="4"
                    height="12"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                  <rect
                    x="90.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                  <rect
                    x="129.5"
                    y="146.5"
                    width="4"
                    height="8"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                  <rect
                    x="168.5"
                    y="146.5"
                    width="4"
                    height="8"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                  <rect
                    x="207.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                  <rect
                    x="247.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                  <rect
                    x="286.5"
                    y="151.5"
                    width="4"
                    height="3"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                  <rect
                    x="325.5"
                    y="154.5"
                    width="4"
                    height="0"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                  <rect
                    x="364.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#434348"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-1"
                  />
                </g>
                <g
                  data-z-index="0.1"
                  class="highcharts-markers highcharts-series-1 highcharts-column-series highcharts-color-1"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="none"
                  opacity="1"
                />
                <g
                  data-z-index="0.1"
                  class="highcharts-series highcharts-series-2 highcharts-column-series highcharts-color-2 highcharts-tracker"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="url(#highcharts-gmti7yu-131-)"
                  opacity="1"
                >
                  <rect
                    x="17.5"
                    y="118.5"
                    width="4"
                    height="36"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                  <rect
                    x="56.5"
                    y="126.5"
                    width="4"
                    height="28"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                  <rect
                    x="95.5"
                    y="150.5"
                    width="4"
                    height="4"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                  <rect
                    x="134.5"
                    y="146.5"
                    width="4"
                    height="8"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                  <rect
                    x="173.5"
                    y="149.5"
                    width="4"
                    height="5"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                  <rect
                    x="212.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                  <rect
                    x="251.5"
                    y="154.5"
                    width="4"
                    height="0"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                  <rect
                    x="290.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                  <rect
                    x="329.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                  <rect
                    x="369.5"
                    y="154.5"
                    width="4"
                    height="0"
                    fill="#90ed7d"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-2"
                  />
                </g>
                <g
                  data-z-index="0.1"
                  class="highcharts-markers highcharts-series-2 highcharts-column-series highcharts-color-2"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="none"
                  opacity="1"
                />
                <g
                  data-z-index="0.1"
                  class="highcharts-series highcharts-series-3 highcharts-column-series highcharts-color-3 highcharts-tracker"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="url(#highcharts-gmti7yu-131-)"
                  opacity="1"
                >
                  <rect
                    x="21.5"
                    y="111.5"
                    width="4"
                    height="43"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                  <rect
                    x="60.5"
                    y="148.5"
                    width="4"
                    height="6"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                  <rect
                    x="100.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                  <rect
                    x="139.5"
                    y="154.5"
                    width="4"
                    height="0"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                  <rect
                    x="178.5"
                    y="133.5"
                    width="4"
                    height="21"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                  <rect
                    x="217.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                  <rect
                    x="256.5"
                    y="154.5"
                    width="4"
                    height="0"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                  <rect
                    x="295.5"
                    y="154.5"
                    width="4"
                    height="0"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                  <rect
                    x="334.5"
                    y="154.5"
                    width="4"
                    height="0"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                  <rect
                    x="373.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#f7a35c"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-3"
                  />
                </g>
                <g
                  data-z-index="0.1"
                  class="highcharts-markers highcharts-series-3 highcharts-column-series highcharts-color-3"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="none"
                  opacity="1"
                />
                <g
                  data-z-index="0.1"
                  class="highcharts-series highcharts-series-4 highcharts-column-series highcharts-color-4 highcharts-tracker"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="url(#highcharts-gmti7yu-131-)"
                  opacity="1"
                >
                  <rect
                    x="26.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                  <rect
                    x="65.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                  <rect
                    x="104.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                  <rect
                    x="143.5"
                    y="153.5"
                    width="4"
                    height="1"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                  <rect
                    x="182.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                  <rect
                    x="222.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                  <rect
                    x="261.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                  <rect
                    x="300.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                  <rect
                    x="339.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                  <rect
                    x="378.5"
                    y="152.5"
                    width="4"
                    height="2"
                    fill="#8085e9"
                    stroke="#ffffff"
                    stroke-width="1"
                    opacity="1"
                    class="highcharts-point highcharts-color-4"
                  />
                </g>
                <g
                  data-z-index="0.1"
                  class="highcharts-markers highcharts-series-4 highcharts-column-series highcharts-color-4"
                  transform="translate(74,10) scale(1 1)"
                  clip-path="none"
                  opacity="1"
                />
              </g>
              <text
                x="238"
                text-anchor="middle"
                class="highcharts-title"
                data-z-index="4"
                style="color:#333333;font-size:18px;display:none;fill:#333333;"
                y="24"
              />
              <text
                x="238"
                text-anchor="middle"
                class="highcharts-subtitle"
                data-z-index="4"
                style="color:#666666;fill:#666666;"
                y="24"
              />
              <text
                x="10"
                text-anchor="start"
                class="highcharts-caption"
                data-z-index="4"
                style="color:#666666;fill:#666666;"
                y="312"
              />
              <g class="highcharts-legend" data-z-index="7" transform="translate(37,253)">
                <rect
                  fill="none"
                  class="highcharts-legend-box"
                  rx="0"
                  ry="0"
                  x="0"
                  y="0"
                  width="401"
                  height="47"
                  visibility="visible"
                />
                <g data-z-index="1">
                  <g>
                    <g
                      class="highcharts-legend-item highcharts-column-series highcharts-color-0 highcharts-series-0"
                      data-z-index="1"
                      transform="translate(8,3)"
                    >
                      <text
                        x="21"
                        style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;"
                        text-anchor="start"
                        data-z-index="2"
                        y="15"
                      >
                        <tspan>Công việc</tspan>
                      </text>
                      <rect
                        x="2"
                        y="4"
                        width="12"
                        height="12"
                        fill="#7cb5ec"
                        rx="6"
                        ry="6"
                        class="highcharts-point"
                        data-z-index="3"
                      />
                    </g>
                    <g
                      class="highcharts-legend-item highcharts-column-series highcharts-color-1 highcharts-series-1"
                      data-z-index="1"
                      transform="translate(143.25,3)"
                    >
                      <text
                        x="21"
                        y="15"
                        style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;"
                        text-anchor="start"
                        data-z-index="2"
                      >
                        <tspan>Đang thực hiện</tspan>
                      </text>
                      <rect
                        x="2"
                        y="4"
                        width="12"
                        height="12"
                        fill="#434348"
                        rx="6"
                        ry="6"
                        class="highcharts-point"
                        data-z-index="3"
                      />
                    </g>
                    <g
                      class="highcharts-legend-item highcharts-column-series highcharts-color-2 highcharts-series-2"
                      data-z-index="1"
                      transform="translate(278.5,3)"
                    >
                      <text
                        x="21"
                        y="15"
                        style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;"
                        text-anchor="start"
                        data-z-index="2"
                      >
                        <tspan>Hoàn thành</tspan>
                      </text>
                      <rect
                        x="2"
                        y="4"
                        width="12"
                        height="12"
                        fill="#90ed7d"
                        rx="6"
                        ry="6"
                        class="highcharts-point"
                        data-z-index="3"
                      />
                    </g>
                    <g
                      class="highcharts-legend-item highcharts-column-series highcharts-color-3 highcharts-series-3"
                      data-z-index="1"
                      transform="translate(8,21)"
                    >
                      <text
                        x="21"
                        y="15"
                        style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;"
                        text-anchor="start"
                        data-z-index="2"
                      >
                        <tspan>Quá hạn</tspan>
                      </text>
                      <rect
                        x="2"
                        y="4"
                        width="12"
                        height="12"
                        fill="#f7a35c"
                        rx="6"
                        ry="6"
                        class="highcharts-point"
                        data-z-index="3"
                      />
                    </g>
                    <g
                      class="highcharts-legend-item highcharts-column-series highcharts-color-4 highcharts-series-4"
                      data-z-index="1"
                      transform="translate(143.25,21)"
                    >
                      <text
                        x="21"
                        y="15"
                        style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;"
                        text-anchor="start"
                        data-z-index="2"
                      >
                        <tspan>Đang đánh giá</tspan>
                      </text>
                      <rect
                        x="2"
                        y="4"
                        width="12"
                        height="12"
                        fill="#8085e9"
                        rx="6"
                        ry="6"
                        class="highcharts-point"
                        data-z-index="3"
                      />
                    </g>
                  </g>
                </g>
              </g>
              <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7">
                <text
                  x="96.14272486435067"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 96.14272486435067 180)"
                  y="180"
                  opacity="1"
                >
                  <tspan>PHÒNG BAN</tspan>
                </text>
                <text
                  x="135.24272486435066"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 135.24272486435066 180)"
                  y="180"
                  opacity="1"
                >
                  <tspan>DỰ ÁN</tspan>
                </text>
                <text
                  x="174.34272486435069"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 174.34272486435069 180)"
                  y="180"
                  opacity="1"
                >
                  <tspan>Phòng ban</tspan>
                </text>
                <text
                  x="213.44272486435068"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 213.44272486435068 180)"
                  y="180"
                  opacity="1"
                >Marketing</text>
                <text
                  x="252.54272486435065"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 252.54272486435065 180)"
                  y="180"
                  opacity="1"
                >
                  <tspan>03 - Phòng ban</tspan>
                </text>
                <text
                  x="291.64272486435067"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 291.64272486435067 180)"
                  y="180"
                  opacity="1"
                >
                  <tspan>Back Office</tspan>
                </text>
                <text
                  x="330.74272486435063"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 330.74272486435063 180)"
                  y="180"
                  opacity="1"
                >Projects</text>
                <text
                  x="369.84272486435066"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 369.84272486435066 180)"
                  y="180"
                  opacity="1"
                >
                  <tspan>Khối cửa hàng</tspan>
                </text>
                <text
                  x="408.9427248643506"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 408.9427248643506 180)"
                  y="180"
                  opacity="1"
                >
                  <tspan>THÔNG TIN</tspan>
                </text>
                <text
                  x="448.04272486435065"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0) rotate(-45 448.04272486435065 180)"
                  y="180"
                  opacity="1"
                >
                  <tspan>Phòng Nhân sự</tspan>
                </text>
              </g>
              <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7">
                <text
                  x="59"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0)"
                  y="168"
                  opacity="1"
                >0</text>
                <text
                  x="59"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0)"
                  y="91"
                  opacity="1"
                >100</text>
                <text
                  x="59"
                  style="color:#666666;cursor:default;font-size:11px;fill:#666666;"
                  text-anchor="end"
                  transform="translate(0,0)"
                  y="14"
                  opacity="1"
                >200</text>
              </g>
            </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:75%"></div>
  </div>
</template>

<script>
export default {
  name: "report-department-chart"
};
</script>

<style>
</style>
