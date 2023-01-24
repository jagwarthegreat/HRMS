import{_ as h}from"./AuthenticatedLayout.f2e6c1c4.js";import{u as y,j as f,o as a,g as c,a as n,b as r,w as i,F as p,H as v,d as e,L as g,e as k,s as x,t as C,n as T,k as I,p as w,q as E}from"./app.810ed7ca.js";import L from"./CreateTypesModal.809e36da.js";import{_ as S}from"./_plugin-vue_export-helper.cdc0426e.js";const o=t=>(w("data-v-64cf71bc"),t=t(),E(),t),B={class:"breadcrumb-item"},D=o(()=>e("li",{class:"breadcrumb-item active","aria-current":"page"},"Settings",-1)),N=o(()=>e("li",{class:"breadcrumb-item active","aria-current":"page"},"Employee Types",-1)),V={class:"col-md-12 text-end mb-2"},F={class:"col-12"},M={class:"card mb-4"},A=o(()=>e("div",{class:"card-header"},"Type List",-1)),H={class:"card-body"},j={class:"row"},q={class:"col-md-12"},z={class:"table table-hover emptypetbl"},G=o(()=>e("thead",null,[e("tr",null,[e("th",null,"TITLE"),e("th",{style:{width:"100px"}})])],-1)),J={key:0},K=["onClick","disabled"],O=o(()=>e("svg",{class:"icon"},[e("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"})],-1)),P=[O],Q={__name:"Index",props:{types:Array,canCreate:Boolean},setup(t){function m(s){$("#"+s).modal("show")}const d=y();function u(s){confirm("Are you sure you want to Delete")&&d.delete(route("settings.emp.types.destroy",s))}return f(()=>{$(".emptypetbl").DataTable(),$(".emptypetbl").attr("style","border-collapse: collapse !important")}),(s,_)=>(a(),c(p,null,[n(r(v),{title:"Employee Types"}),n(h,null,{breadcrumbs:i(()=>[e("li",B,[n(r(g),{href:s.route("dashboard")},{default:i(()=>[k("Dashboard")]),_:1},8,["href"])]),D,N]),default:i(()=>[e("div",V,[e("button",{class:"btn btn-dark btn-sm",onClick:_[0]||(_[0]=l=>m("createTypeModal"))}," Create Employee Types ")]),e("div",F,[e("div",M,[A,e("div",H,[e("div",j,[e("div",q,[e("table",z,[G,t.types.length>0?(a(),c("tbody",J,[(a(!0),c(p,null,x(t.types,(l,b)=>(a(),c("tr",{key:b},[e("td",null,C(l.title),1),e("td",null,[e("button",{class:T(["btn btn-sm btn-ghost-secondary text-dark",{"opacity-25":r(d).processing}]),onClick:R=>u(l.id),disabled:r(d).processing},P,10,K)])]))),128))])):I("",!0)])])])])])]),n(L)]),_:1})],64))}},Z=S(Q,[["__scopeId","data-v-64cf71bc"]]);export{Z as default};