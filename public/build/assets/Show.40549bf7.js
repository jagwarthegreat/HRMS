import{u as _,o as f,g as p,a as t,b as o,w as r,F as b,H as v,d as e,L as d,e as i,h as l,v as m,n as u}from"./app.ad2c8530.js";import{_ as k}from"./AuthenticatedLayout.b6b5c74d.js";import g from"./ShowProcurementDetails.fc1af997.js";import w from"./CreateProcurementDetails.7eda4fff.js";import F from"./ShowProcurementInfo.f57638e5.js";import"./_plugin-vue_export-helper.cdc0426e.js";const x={class:"breadcrumb-item"},y=e("li",{class:"breadcrumb-item active","aria-current":"page"},"Procurements",-1),P={class:"col-md-12 text-start mb-2"},S=e("svg",{class:"icon"},[e("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-arrow-left"})],-1),B={class:"row"},C={class:"col-md-12"},D={class:"row"},N={class:"col-md-4"},V={class:"row"},$={class:"col-md-12"},H=["disabled"],L=e("svg",{class:"icon"},[e("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-check"})],-1),A={__name:"Show",props:{details:[],procurement:[],stocks:[]},setup(s){const n=s,c=_({procurement_id:n.procurement.id}),h=()=>{c.post(route("procurement.finish"),{onSuccess:()=>{}})};return(a,z)=>(f(),p(b,null,[t(o(v),{title:"Procurements Details"}),t(k,null,{breadcrumbs:r(()=>[e("li",x,[t(o(d),{href:a.route("dashboard")},{default:r(()=>[i("Dashboard")]),_:1},8,["href"])]),y]),default:r(()=>[e("div",P,[t(o(d),{class:"btn btn-dark btn-sm",href:a.route("procurement")},{default:r(()=>[S,i(" Go back ")]),_:1},8,["href"])]),e("div",B,[e("div",C,[t(F,{procurement:s.procurement},null,8,["procurement"])]),e("div",D,[l(e("div",N,[t(w,{stocks:s.stocks,procurement_id:s.procurement.id},null,8,["stocks","procurement_id"])],512),[[m,s.procurement.status==0]]),e("div",{class:u(n.procurement.status==0?"col-md-8":"col-md-12")},[t(g,{details:s.details},null,8,["details"])],2)])]),l(e("div",V,[e("div",$,[e("button",{type:"button",class:u(["btn btn-primary rounded-pill",{"opacity-25":o(c).processing}]),style:{float:"right"},onClick:h,disabled:o(c).processing},[L,i(" Finish Procurement ")],10,H)])],512),[[m,s.procurement.status==0]])]),_:1})],64))}};export{A as default};
