import{o as n,g as s,d as t,F as u,x as p,t as a,k as c,p as i,q as h}from"./app.c4c2e632.js";import{_ as b}from"./_plugin-vue_export-helper.cdc0426e.js";const r=e=>(i("data-v-68d56bdb"),e=e(),h(),e),m={class:"col-12"},y={class:"table table-hover",style:{border:"1px solid #ddd"}},g=r(()=>t("thead",null,[t("tr",null,[t("th",null,"Subject"),t("th",null,"Content"),t("th",null,"Date")])],-1)),k={key:0},v=r(()=>t("td",{colspan:"5"},"No memos found.",-1)),x=[v],f=["innerHTML"],M=["innerHTML"],T={__name:"MemosTab",props:{props:Object},setup(e){function l(d){return $("<textarea/>").html(d).text()}return(d,L)=>(n(),s("div",m,[t("table",y,[g,t("tbody",null,[e.props.employee.memos.length<1?(n(),s("tr",k,x)):(n(!0),s(u,{key:1},p(e.props.employee.memos,(o,_)=>(n(),s("tr",{key:_},[t("td",null,a(o.subject),1),t("td",null,[o.content.length<100?(n(),s("div",{key:0,innerHTML:l(o.content)},null,8,f)):c("",!0),o.content.length>=100?(n(),s("div",{key:1,innerHTML:l(o.content.substring(0,100)+"...")},null,8,M)):c("",!0)]),t("td",null,a(o.memo_date),1)]))),128))])])]))}},I=b(T,[["__scopeId","data-v-68d56bdb"]]);export{I as default};
