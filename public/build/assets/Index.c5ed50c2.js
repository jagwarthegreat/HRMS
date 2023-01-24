import{_ as p}from"./AuthenticatedLayout.f2e6c1c4.js";import{u as g,j as y,o as a,g as c,a as r,b as d,w as l,F as u,H as f,d as e,L as v,e as k,s as C,t as x,n as D,k as I,p as w,q as L}from"./app.810ed7ca.js";import S from"./CreateDocCategoryModal.1da6bd40.js";import{_ as T}from"./_plugin-vue_export-helper.cdc0426e.js";const o=t=>(w("data-v-d3738678"),t=t(),L(),t),B={class:"breadcrumb-item"},N=o(()=>e("li",{class:"breadcrumb-item active","aria-current":"page"},"Settings",-1)),V=o(()=>e("li",{class:"breadcrumb-item active","aria-current":"page"}," Document Category ",-1)),F={class:"col-md-12 text-end mb-2"},M={class:"col-12"},A={class:"card mb-4"},E=o(()=>e("div",{class:"card-header"},"Type List",-1)),H={class:"card-body"},j={class:"row"},q={class:"col-md-12"},z={class:"table table-hover doccategorytbl"},G=o(()=>e("thead",null,[e("tr",null,[e("th",null,"TITLE"),e("th",{style:{width:"100px"}})])],-1)),J={key:0},K=["onClick","disabled"],O=o(()=>e("svg",{class:"icon"},[e("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"})],-1)),P=[O],Q={__name:"Index",props:{doccategories:Array,canCreate:Boolean},setup(t){function m(s){$("#"+s).modal("show")}const n=g();function h(s){confirm("Are you sure you want to Delete")&&n.delete(route("settings.doc.category.destroy",s))}return y(()=>{$(".doccategorytbl").DataTable(),$(".doccategorytbl").attr("style","border-collapse: collapse !important")}),(s,_)=>(a(),c(u,null,[r(d(f),{title:"Document Category"}),r(p,null,{breadcrumbs:l(()=>[e("li",B,[r(d(v),{href:s.route("dashboard")},{default:l(()=>[k("Dashboard")]),_:1},8,["href"])]),N,V]),default:l(()=>[e("div",F,[e("button",{class:"btn btn-dark btn-sm",onClick:_[0]||(_[0]=i=>m("createDocCatModal"))}," Create Document Category ")]),e("div",M,[e("div",A,[E,e("div",H,[e("div",j,[e("div",q,[e("table",z,[G,t.doccategories.length>0?(a(),c("tbody",J,[(a(!0),c(u,null,C(t.doccategories,(i,b)=>(a(),c("tr",{key:b},[e("td",null,x(i.title),1),e("td",null,[e("button",{class:D(["btn btn-sm btn-ghost-secondary text-dark",{"opacity-25":d(n).processing}]),onClick:R=>h(i.id),disabled:d(n).processing},P,10,K)])]))),128))])):I("",!0)])])])])])]),r(S)]),_:1})],64))}},Z=T(Q,[["__scopeId","data-v-d3738678"]]);export{Z as default};