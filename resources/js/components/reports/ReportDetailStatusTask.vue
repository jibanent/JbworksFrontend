<template>
  <div class="box std" data-col="8,9" style="width: 33.33%;">
    <div class="inner">
      <div class="header">
        Báo cáo trạng thái công việc
        <div class="side"></div>
      </div>
      <div class="body">
        <div class="graph">
          <div style="height: 170.597px; overflow: hidden;">
            <div class="highcharts-container">
              <svg
                class="highcharts-root"
              >
                <g class="highcharts-series-group" data-z-index="3">
                  <g
                    data-z-index="0.1"
                    class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-tracker"
                    transform="translate(10,10) scale(1 1)"
                    style="cursor:pointer;"
                  >
                    <path
                      fill="#f54e3b"
                      d="M 131.9871685881672 10.00000130670739 A 63 63 0 0 1 194.97870719953497 74.63781545823763 L 182.38296575962798 74.31025236659009 A 50.4 50.4 0 0 0 131.98973487053377 22.600001045365914 Z"
                      transform="translate(0,0)"
                      stroke="#ffffff"
                      stroke-width="1"
                      opacity="1"
                      stroke-linejoin="round"
                      class="highcharts-point highcharts-color-0"
                    />
                    <path
                      fill="#389dd9"
                      d="M 194.97703789499872 74.70079333603304 A 63 63 0 1 1 72.82832372634168 51.37333296678888 L 84.66265898107335 55.69866637343111 A 50.4 50.4 0 1 0 182.38163031599896 74.36063466882644 Z"
                      transform="translate(0,0)"
                      stroke="#ffffff"
                      stroke-width="1"
                      opacity="1"
                      stroke-linejoin="round"
                      class="highcharts-point highcharts-color-1"
                    />
                    <path
                      fill="#14cc3f"
                      d="M 72.84997997560612 51.31417211370979 A 63 63 0 0 1 120.75901128833546 11.010967318531009 L 123.00720903066836 23.40877385482481 A 50.4 50.4 0 0 0 84.67998398048489 55.651337690967836 Z"
                      transform="translate(0,0)"
                      stroke="#ffffff"
                      stroke-width="1"
                      opacity="1"
                      stroke-linejoin="round"
                      class="highcharts-point highcharts-color-2"
                    />
                    <path
                      fill="#f7e015"
                      d="M 120.82100593117933 10.999757326206598 A 63 63 0 0 1 131.9124942639015 10.00006077188526 L 131.92999541112118 22.600048617508214 A 50.4 50.4 0 0 0 123.05680474494346 23.39980586096528 Z"
                      transform="translate(0,0)"
                      stroke="#ffffff"
                      stroke-width="1"
                      opacity="1"
                      stroke-linejoin="round"
                      class="highcharts-point highcharts-color-3"
                    />
                  </g>
                  
                </g>
              </svg>
            </div>
          </div>
          <div class="legends -inline">
            <div class="legend">
              <div class="circle" style="background-color:#14cc3f"></div>239 done ontime
            </div>
            <div class="legend">
              <div class="circle" style="background-color:#f7e015"></div>41 done late
            </div>
            <div class="legend">
              <div class="circle" style="background-color:#389dd9"></div>796 in progress
            </div>
            <div class="legend">
              <div class="circle" style="background-color:#f54e3b"></div>367 overdue
            </div>
          </div>
          <div class="gcount">
            1,443
            <em>tasks</em>
          </div>
        </div>
      </div>
    </div>
    <div class="s" style="padding-bottom:112.5%"></div>
  </div>
</template>

<script>
export default {
  name: "report-detail-status-task"
};
</script>

<style>
</style>
