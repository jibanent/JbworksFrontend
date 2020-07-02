<template>
  <div class="range pointer" :title="$t('tasks.filter tasks by created date')">
    <date-picker
      mode="range"
      :columns="$screens({ lg: 2 }, 1)"
      v-model="range"
      :popover="{ placement: 'bottom', visibility: 'click' }"
      drag
    >
      <button class="btn-picker">
        <span class="js-clickable" v-if="!date.start && !date.end">
          {{ $t('tasks.created date') }}
          <span class="-ap icon-chevron-down2"></span>
        </span>
        <span class="js-clickable" v-else>
          {{ $t('tasks.created date') }}
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
import i18n from "../../lang";
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
        ? moment(this.date.start)
            .locale(i18n.locale)
            .format("L")
        : null;
    },
    end() {
      return this.date.end
        ? moment(this.date.end)
            .locale(i18n.locale)
            .format("L")
        : null;
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
