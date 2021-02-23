<template>
    <div>
    <button @click="exportPDF">Export PDF</button>
      <label class="typo__label">Groups</label>
          <multiselect
          v-model="value"
          :options="options"
          :multiple="true"
          group-values="libs"
          group-label="title"
          :group-select="true"
          placeholder="Type to search"
          track-by="name"
          label="name"
          :preselect-first="true"
          :close-on-select="false"
          :clear-on-select="false"
          :preserve-search="true"
          >
          <span slot="noResult">Oops! No elements found. Consider changing the search query.</span></multiselect>
      <pre class="language-json"><code>{{ value  }}</code></pre>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
import { jsPDF } from "jspdf";
import 'jspdf-autotable';

export default {
components: {
  Multiselect
},
data () {
  return {
    options: [],
    value: [],
  }
},
created() {
  this.getDoc();

  this.checData();
},
  methods: {
    getDoc() {
      axios.get('/doc').then((response) => {
        this.options = response.data;
        console.log(options);
      }).catch((err) => {})
    },
    exportPDF() {
      var vm = this
       var columns = [
         {title: "Title", dataKey: "title"},
         {title: "Name", dataKey: "name"}
       ];
       var doc = new jsPDF('p', 'pt');
       doc.text('Insurance document', 40, 40);
       doc.autoTable(columns, vm.value, {
         margin: {top: 60},
       });
       doc.save('insurance.pdf');
    },
    checData()
    {
      console.log(this.value);
    }
  },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
