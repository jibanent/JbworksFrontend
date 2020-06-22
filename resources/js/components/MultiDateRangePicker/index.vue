<template>
  <div
    class="range pointer"
    title="Lọc công việc theo ngày tạo, mặc định lấy từ ngày tạo dự án tới ngày hiện tại"
  >
    <date-picker
      mode="range"
      :columns="$screens({ lg: 2 }, 1)"
      v-model="range"
      :popover="{ placement: 'bottom', visibility: 'click' }"
      drag
    >
      <button class="btn-picker">
        <span class="js-clickable" v-if="!date.start && !date.end">
          Ngày tạo
          <span class="-ap icon-chevron-down2"></span>
        </span>
        <span class="js-clickable" v-else>
          Ngày tạo:
          <em>{{ start }}</em> ›&nbsp;
          <em>{{ end }}</em>
        </span>
      </button>
    </date-picker>
  </div>
</template>

<script>
import DatePicker from "v-calendar/lib/components/date-picker.umd";
import moment from "moment";
export default {
  name: "multi-date-range-picker",
  props: {
    date: { type: Object, default: null }
  },
  data() {
    return {
      range: null
    };
  },
  components: {
    DatePicker
  },
  updated() {
    this.handleFilterByDate(this.range);
  },
  methods: {
    handleFilterByDate(range) {
      if (range) {
        const start = moment(range.start).format("YYYY-MM-DD");
        const end = moment(range.end).format("YYYY-MM-DD");
        this.$emit("range", { start, end });
      }
    }
  },
  computed: {
    start() {
      return this.date.start
        ? moment(this.date.start).format("DD/MM/YYYY")
        : null;
    },
    end() {
      return this.date.end ? moment(this.date.end).format("DD/MM/YYYY") : null;
    }
  }
};
</script>

<style scoped>
.btn-picker {
  border: none;
  background: transparent;
}
.btn-picker:hover {
  cursor: pointer;
}
</style>
