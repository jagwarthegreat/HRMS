import{_ as y}from"./AuthenticatedLayout.fb5b4752.js";import{u as k,j as x,o as l,g as c,a as r,b as o,w as _,F as h,H as C,d as t,L as P,e as I,x as M,t as w,n as b,k as T,p as L,q as B}from"./app.17ce0bb9.js";import D from"./CreatePositionModal.a2400842.js";import{_ as N}from"./_plugin-vue_export-helper.cdc0426e.js";const n=s=>(L("data-v-929ed4b5"),s=s(),B(),s),S={class:"breadcrumb-item"},V=n(()=>t("li",{class:"breadcrumb-item active","aria-current":"page"},"Position",-1)),A={class:"col-md-12 text-end mb-2"},E={class:"col-12"},F={class:"card mb-4"},H=n(()=>t("div",{class:"card-header"},"Position List",-1)),j={class:"card-body"},q={class:"row"},z={class:"col-md-12"},G={class:"table table-hover positiontbl"},J=n(()=>t("thead",null,[t("tr",null,[t("th",null,"TITLE"),t("th",{style:{width:"100px"}})])],-1)),K={key:0},O=["onClick","disabled"],Q=n(()=>t("svg",{class:"icon"},[t("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"})],-1)),R=[Q],U=["onClick","disabled"],W=n(()=>t("svg",{class:"icon"},[t("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"})],-1)),X=[W],Y={__name:"Index",props:{positions:Array,canCreate:Boolean},setup(s){function u(e){$("#"+e).modal("show")}const i=k();function p(e){confirm("Are you sure you want to Delete")&&i.delete(route("position.destroy",e))}x(()=>{$(".positiontbl").DataTable(),$(".positiontbl").attr("style","border-collapse: collapse !important")});function m(e){$("#createPositionModalTitle").html("Add Position"),$("#title").val(""),$("#position_id").val(""),u(e)}function v(e,d){$("#createPositionModalTitle").html("Edit Position"),$("#title").val(d),$("#position_id").val(e),u("createPositionModal")}return(e,d)=>(l(),c(h,null,[r(o(C),{title:"Position"}),r(y,null,{breadcrumbs:_(()=>[t("li",S,[r(o(P),{href:e.route("dashboard")},{default:_(()=>[I("Dashboard")]),_:1},8,["href"])]),V]),default:_(()=>[t("div",A,[t("button",{class:"btn btn-dark btn-sm",onClick:d[0]||(d[0]=a=>m("createPositionModal"))}," Create Position ")]),t("div",E,[t("div",F,[H,t("div",j,[t("div",q,[t("div",z,[t("table",G,[J,s.positions.length>0?(l(),c("tbody",K,[(l(!0),c(h,null,M(s.positions,(a,f)=>(l(),c("tr",{key:f},[t("td",null,w(a.title),1),t("td",null,[t("button",{class:b(["btn btn-sm btn-ghost-secondary text-dark",{"opacity-25":o(i).processing}]),onClick:g=>p(a.id),disabled:o(i).processing},R,10,O),t("button",{class:b(["btn btn-sm btn-ghost-secondary text-dark",{"opacity-25":o(i).processing}]),onClick:g=>v(a.id,a.title),disabled:o(i).processing},X,10,U)])]))),128))])):T("",!0)])])])])])]),r(D)]),_:1})],64))}},ot=N(Y,[["__scopeId","data-v-929ed4b5"]]);export{ot as default};