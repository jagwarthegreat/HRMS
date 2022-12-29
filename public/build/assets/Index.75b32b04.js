import{_ as f}from"./AuthenticatedLayout.b6b5c74d.js";import{u as v,j as y,o as a,g as n,a as c,b as l,w as r,F as u,H as k,d as t,L as g,e as x,s as L,t as m,n as C,k as I,p as w,q as N}from"./app.ad2c8530.js";import T from"./CreateLocationModal.b9ac473b.js";import{_ as B}from"./_plugin-vue_export-helper.cdc0426e.js";const d=e=>(w("data-v-2ac74bad"),e=e(),N(),e),D={class:"breadcrumb-item"},S=d(()=>t("li",{class:"breadcrumb-item active","aria-current":"page"},"Location",-1)),V={class:"col-md-12 text-end mb-2"},A={class:"col-12"},E={class:"card mb-4"},F=d(()=>t("div",{class:"card-header"},"Location List",-1)),M={class:"card-body"},H={class:"row"},j={class:"col-md-12"},q={class:"table table-hover locationtbl"},z=d(()=>t("thead",null,[t("tr",null,[t("th",null,"TITLE"),t("th",null,"CLIENT"),t("th",{style:{width:"100px"}})])],-1)),G={key:0},J=["onClick","disabled"],K=d(()=>t("svg",{class:"icon"},[t("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"})],-1)),O=[K],P={__name:"Index",props:{locations:Array,clients:Array,canCreate:Boolean},setup(e){function b(s){$("#"+s).modal("show")}const i=v();function h(s){confirm("Are you sure you want to Delete")&&i.delete(route("location.destroy",s))}return y(()=>{$(".locationtbl").DataTable(),$(".locationtbl").attr("style","border-collapse: collapse !important")}),(s,_)=>(a(),n(u,null,[c(l(k),{title:"Location"}),c(f,null,{breadcrumbs:r(()=>[t("li",D,[c(l(g),{href:s.route("dashboard")},{default:r(()=>[x("Dashboard")]),_:1},8,["href"])]),S]),default:r(()=>[t("div",V,[t("button",{class:"btn btn-dark btn-sm",onClick:_[0]||(_[0]=o=>b("createLocationModal"))}," Create Location ")]),t("div",A,[t("div",E,[F,t("div",M,[t("div",H,[t("div",j,[t("table",q,[z,e.locations.length>0?(a(),n("tbody",G,[(a(!0),n(u,null,L(e.locations,(o,p)=>(a(),n("tr",{key:p},[t("td",null,m(o.title),1),t("td",null,m(o.client!=null?o.client.name:"---"),1),t("td",null,[t("button",{class:C(["btn btn-sm btn-ghost-secondary text-dark",{"opacity-25":l(i).processing}]),onClick:Q=>h(o.id),disabled:l(i).processing},O,10,J)])]))),128))])):I("",!0)])])])])])]),c(T,{clients:e.clients},null,8,["clients"])]),_:1})],64))}},Y=B(P,[["__scopeId","data-v-2ac74bad"]]);export{Y as default};
