import{_ as g}from"./AuthenticatedLayout.b6b5c74d.js";import{u as k,j as x,o as l,g as r,a,b as o,w as i,F as b,H as C,d as t,L as h,e as c,t as p,s as S,n as I,k as L,p as D,q as B}from"./app.ad2c8530.js";import M from"./CreateSettlementModal.cfdeedf4.js";import{_ as F}from"./_plugin-vue_export-helper.cdc0426e.js";const _=s=>(D("data-v-b754a4bb"),s=s(),B(),s),H={class:"breadcrumb-item"},N={class:"breadcrumb-item"},T=_(()=>t("li",{class:"breadcrumb-item active","aria-current":"page"},"Settlements",-1)),V={class:"col-md-12 text-end mb-2"},A=["href"],j={class:"col-12"},q={class:"card mb-4"},z={class:"card-header"},E={class:"card-body"},G={class:"row"},J={class:"col-md-12"},K={class:"table table-hover settlementtbl"},O=_(()=>t("thead",null,[t("tr",null,[t("th",null,"Content"),t("th",null,"Date"),t("th",{style:{width:"100px"}})])],-1)),P={key:0},Q=["innerHTML"],R={style:{width:"200px","vertical-align":"baseline"}},U={style:{width:"100px","vertical-align":"baseline"}},W=["onClick","disabled"],X=_(()=>t("svg",{class:"icon"},[t("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"})],-1)),Y=[X],Z={__name:"Index",props:{lawsuit:Array,settlements:Array,canCreate:Boolean},setup(s){const u=s;function f(e){$("#"+e).modal("show")}const d=k({lawsuit_id:u.lawsuit.id});function v(e){confirm("Are you sure you want to Delete")&&d.delete(route("lawsuit.settlement.destroy",e))}function y(e){return $("<textarea/>").html(e).text()}return x(()=>{$(".settlementtbl").DataTable(),$(".settlementtbl").attr("style","border-collapse: collapse !important")}),(e,m)=>(l(),r(b,null,[a(o(C),{title:"Settlements"}),a(g,null,{breadcrumbs:i(()=>[t("li",H,[a(o(h),{href:e.route("dashboard")},{default:i(()=>[c("Dashboard")]),_:1},8,["href"])]),t("li",N,[a(o(h),{href:e.route("lawsuit")},{default:i(()=>[c("Lawsuit/Cases")]),_:1},8,["href"])]),T]),default:i(()=>[t("div",V,[t("a",{class:"btn btn-default btn-sm me-2",href:e.route("lawsuit")}," Go Back ",8,A),t("button",{class:"btn btn-dark btn-sm",onClick:m[0]||(m[0]=n=>f("createSettlementModal"))}," Create Settlement ")]),t("div",j,[t("div",q,[t("div",z,[c(" Settlement List For: "),t("b",null,[t("u",null,p(s.lawsuit.case),1)])]),t("div",E,[t("div",G,[t("div",J,[t("table",K,[O,s.settlements.length>0?(l(),r("tbody",P,[(l(!0),r(b,null,S(s.settlements,(n,w)=>(l(),r("tr",{key:w},[t("td",{style:{"vertical-align":"baseline"},innerHTML:y(n.content)},null,8,Q),t("td",R,p(n.date),1),t("td",U,[t("button",{class:I(["btn btn-sm btn-ghost-secondary text-dark",{"opacity-25":o(d).processing}]),onClick:tt=>v(n.id),disabled:o(d).processing},Y,10,W)])]))),128))])):L("",!0)])])])])])]),a(M,{props:u},null,8,["props"])]),_:1})],64))}},nt=F(Z,[["__scopeId","data-v-b754a4bb"]]);export{nt as default};
