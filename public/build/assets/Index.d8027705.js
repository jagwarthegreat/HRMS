import{_ as f}from"./AuthenticatedLayout.fb5b4752.js";import{u as h,o as p,g,a as e,b as a,w as n,F as k,H as x,d as t,L as i,e as c,t as v,n as d,p as y,q as w}from"./app.17ce0bb9.js";import I from"./GeneralInfoTab.e536c843.js";import C from"./DocumentsTab.426eb646.js";import T from"./LocationsTab.21d00f30.js";/* empty css                                                                    */import{_ as S}from"./_plugin-vue_export-helper.cdc0426e.js";import"./AddDocumentModal.e7e3eea2.js";const m=o=>(y("data-v-fcd33cf0"),o=o(),w(),o),j={class:"breadcrumb-item"},D={class:"breadcrumb-item"},L=m(()=>t("li",{class:"breadcrumb-item active","aria-current":"page"},"Profile",-1)),$={class:"col-md-12 text-start mb-2"},B={class:"col-md-12 mb-4"},F={class:"row"},G={class:"col-12"},N={class:"row"},O={class:"col-md-9"},V={class:"card mb-2",style:{background:"transparent","box-shadow":"none"}},H={class:"card-body d-flex",style:{"overflow-y":"auto"}},P={class:"d-flex flex-column justify-content-center ms-4"},q={href:"#"},z=m(()=>t("svg",{class:"icon"},[t("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-screen-smartphone"})],-1)),A={class:"col-12"},E={class:"card"},J={class:"card-header"},K={class:"nav nav-tabs card-header-tabs"},M={class:"nav-item"},Q={class:"nav-item"},R={class:"nav-item"},U={class:"card-body"},W={class:"tab-content",id:"nav-tabContent"},X={__name:"Index",props:{client:Object,locations:Object,docCategories:Object},setup(o){const u=o;h({tab:""});function b(r){axios.post(route("client.tabSwitchTo",r)).catch(s=>{console.log(s)})}const l=sessionClientActiveTab;return(r,s)=>(p(),g(k,null,[e(a(x),{title:"Client Profile"}),e(f,null,{breadcrumbs:n(()=>[t("li",j,[e(a(i),{href:r.route("dashboard")},{default:n(()=>[c("Dashboard")]),_:1},8,["href"])]),t("li",D,[e(a(i),{href:r.route("client")},{default:n(()=>[c("Client")]),_:1},8,["href"])]),L]),default:n(()=>[t("div",$,[e(a(i),{class:"btn btn-dark btn-sm",href:r.route("client")},{default:n(()=>[c(" Go back ")]),_:1},8,["href"])]),t("div",B,[t("div",F,[t("div",G,[t("div",N,[t("div",O,[t("div",V,[t("div",H,[t("div",P,[t("h4",null,[t("b",null,v(o.client.name),1)]),t("a",q,v(o.client.email),1),t("span",null,[z,c(" "+v(o.client.contact),1)])])])])])])]),t("div",A,[t("div",E,[t("div",J,[t("ul",K,[t("li",M,[e(a(i),{onClick:s[0]||(s[0]=_=>b("generalInfo")),class:d(a(l)=="generalInfo"?"nav-link active":"nav-link"),id:"nav-home-tab","data-coreui-toggle":"tab","data-coreui-target":"#nav-home",type:"button",role:"tab","aria-controls":"nav-home","aria-selected":"true"},{default:n(()=>[c("General Info ")]),_:1},8,["class"])]),t("li",Q,[e(a(i),{onClick:s[1]||(s[1]=_=>b("documents")),class:d(a(l)=="documents"?"nav-link active":"nav-link"),id:"nav-document-tab","data-coreui-toggle":"tab","data-coreui-target":"#nav-document",type:"button",role:"tab","aria-controls":"nav-document","aria-selected":"true"},{default:n(()=>[c("Documents ")]),_:1},8,["class"])]),t("li",R,[e(a(i),{onClick:s[2]||(s[2]=_=>b("locations")),class:d(a(l)=="locations"?"nav-link active":"nav-link"),id:"nav-locations-tab","data-coreui-toggle":"tab","data-coreui-target":"#nav-locations",type:"button",role:"tab","aria-controls":"nav-locations","aria-selected":"true"},{default:n(()=>[c("Locations ")]),_:1},8,["class"])])])]),t("div",U,[t("div",W,[t("div",{class:d(["tab-pane fade show",a(l)=="generalInfo"?"active":""]),id:"nav-home",role:"tabpanel","aria-labelledby":"nav-home-tab",tabindex:"0"},[e(I,{client:o.client},null,8,["client"])],2),t("div",{class:d(["tab-pane fade show",a(l)=="documents"?"active":""]),id:"nav-document",role:"tabpanel","aria-labelledby":"nav-document-tab",tabindex:"0"},[e(C,{props:u},null,8,["props"])],2),t("div",{class:d(["tab-pane fade show",a(l)=="locations"?"active":""]),id:"nav-locations",role:"tabpanel","aria-labelledby":"nav-locations-tab",tabindex:"0"},[e(T,{props:u},null,8,["props"])],2)])])])])])])]),_:1})],64))}},ct=S(X,[["__scopeId","data-v-fcd33cf0"]]);export{ct as default};