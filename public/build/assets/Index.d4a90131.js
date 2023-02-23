import{_ as v}from"./AuthenticatedLayout.38b2fc2d.js";import{u as y,j as g,o as n,g as l,a as i,b as d,w as _,F as h,H as w,d as t,L as x,e as k,x as C,t as o,n as L,k as I,p as D,q as N}from"./app.c4c2e632.js";import S from"./CreateLawsuitModal.5f85dfbe.js";import{_ as B}from"./_plugin-vue_export-helper.cdc0426e.js";const c=s=>(D("data-v-f9705a53"),s=s(),N(),s),V={class:"breadcrumb-item"},j=c(()=>t("li",{class:"breadcrumb-item active","aria-current":"page"},"Lawsuit/Cases",-1)),F={class:"col-md-12 text-end mb-2"},M={class:"col-12"},H={class:"card mb-4"},O=c(()=>t("div",{class:"card-header"},"Lawsuit List",-1)),T={class:"card-body"},q={class:"row"},z={class:"col-md-12"},A={class:"table table-hover lawsuittbl"},E=c(()=>t("thead",null,[t("tr",null,[t("th",null,"Date"),t("th",null,"Case"),t("th",null,"Complianant"),t("th",null,"Respondent"),t("th",null,"Status"),t("th",{style:{width:"100px"}})])],-1)),R={key:0},G={style:{width:"100px","vertical-align":"baseline"}},J={style:{"vertical-align":"baseline"}},K=["href"],P={style:{"vertical-align":"baseline"}},Q={style:{"vertical-align":"baseline"}},U={style:{"vertical-align":"baseline"}},W={style:{width:"100px","vertical-align":"baseline"}},X=["onClick","disabled"],Y=c(()=>t("svg",{class:"icon"},[t("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"})],-1)),Z=[Y],tt={__name:"Index",props:{lawsuits:Object,employees:Object,canCreate:Boolean},setup(s){const b=s;function p(a){$("#"+a).modal("show")}const r=y();function m(a){confirm("Are you sure you want to Delete")&&r.delete(route("lawsuit.destroy",a))}return g(()=>{$(".lawsuittbl").DataTable(),$(".lawsuittbl").attr("style","border-collapse: collapse !important")}),(a,u)=>(n(),l(h,null,[i(d(w),{title:"Lawsuit/Cases"}),i(v,null,{breadcrumbs:_(()=>[t("li",V,[i(d(x),{href:a.route("dashboard")},{default:_(()=>[k("Dashboard")]),_:1},8,["href"])]),j]),default:_(()=>[t("div",F,[t("button",{class:"btn btn-dark btn-sm",onClick:u[0]||(u[0]=e=>p("createLawsuitModal"))}," Create New Lawsuit ")]),t("div",M,[t("div",H,[O,t("div",T,[t("div",q,[t("div",z,[t("table",A,[E,s.lawsuits.length>0?(n(),l("tbody",R,[(n(!0),l(h,null,C(s.lawsuits,(e,f)=>(n(),l("tr",{key:f},[t("td",G,o(e.case_date),1),t("td",J,[t("a",{href:a.route("lawsuit.settlement",e.id)},o(e.case),9,K)]),t("td",P,o(e.complainant),1),t("td",Q,o(e.respondent),1),t("td",U,o(e.status),1),t("td",W,[t("button",{class:L(["btn btn-sm btn-ghost-secondary text-dark",{"opacity-25":d(r).processing}]),onClick:et=>m(e.id),disabled:d(r).processing},Z,10,X)])]))),128))])):I("",!0)])])])])])]),i(S,{props:b},null,8,["props"])]),_:1})],64))}},lt=B(tt,[["__scopeId","data-v-f9705a53"]]);export{lt as default};