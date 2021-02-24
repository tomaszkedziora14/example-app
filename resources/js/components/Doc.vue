<template>
    <div>
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
      <button @click="exportPDF">Export PDF</button>
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
    options: [     {
          title: 'Javascript',
          libs: [
            { name: 'Vue.js', title: 'Front-end' },
            { name: 'Adonis', title: 'Backend' }
          ]
        },
        {
          titlee: 'Ruby',
          libs: [
            { name: 'Rails', title: 'Backend' },
            { name: 'Sinatra', title: 'Backend' }
          ]
        },
        {
          title: 'Other',
          libs: [
            { name: 'Laravel', title: 'Backend' },
            { name: 'Phoenix', title: 'Backend' }
          ]
        }],
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
    var columns = [
        {title: "Title", dataKey: "title"},
         {title: "Name", dataKey: "name"}
      ];

    var doc = new jsPDF('p', 'pt');
    doc.text('Insurance document', 40, 40);
    doc.autoTable(columns, this.value, {
         margin: {top: 60},
    });

    if(this.value.length){
        doc.save('insurance.pdf');
    }
  },
  checData()
    {

    },
  },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
