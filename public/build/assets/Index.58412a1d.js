import{u as y,j as w,o as d,g as i,a as n,b as c,w as u,F as f,H as x,d as e,L as v,e as p,s as C,t as r,h,v as _,n as D,k as P}from"./app.ad2c8530.js";import{_ as S}from"./AuthenticatedLayout.b6b5c74d.js";import F from"./CreateProcurementModal.ba2b45bc.js";import L from"./CreateProcurementDetailsModal.42d2beca.js";import"./_plugin-vue_export-helper.cdc0426e.js";const M={class:"breadcrumb-item"},N=e("li",{class:"breadcrumb-item active","aria-current":"page"},"Procurements",-1),V={class:"col-md-12 text-end mb-2"},B=e("svg",{class:"icon"},[e("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-plus"})],-1),H={class:"card mb-4"},I=e("div",{class:"card-header"},"Procurements List",-1),R={class:"card-body"},T={class:"col-md-12"},j={class:"row"},z={class:"table table-hover procuretbl"},A=e("thead",null,[e("tr",null,[e("th",null,"#"),e("th",null,"Reference"),e("th",null,"Date"),e("th",null,"Invoice"),e("th",null,"Supplier"),e("th",null,"Remarks"),e("th",null,"Status"),e("th")])],-1),E={key:0},q={class:"badge text-bg-success"},G={class:"badge text-bg-warning"},J=e("svg",{class:"icon"},[e("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-pen"})],-1),K=["onClick","disabled"],O=e("svg",{class:"icon"},[e("use",{"xlink:href":"/theme/vendors/@coreui/icons/svg/free.svg#cil-trash"})],-1),Q=[O],te={__name:"Index",props:{procurements:[],procurement_data:[],stocks:[]},setup(l){const a=l;function g(o,s=[]){a.procurement_data.reference=s.reference,a.procurement_data.id=s.id,a.procurement_data.invoice=s.invoice,a.procurement_data.date=s.date,a.procurement_data.supplier=s.supplier,a.procurement_data.remarks=s.remarks,a.procurement_data.status=s.status,$("#"+o).modal("show")}const m=y(),k=o=>{confirm("Are you sure you want to Delete")&&m.delete(route("procurement.destroy",o))};return w(()=>{$(".procuretbl").DataTable(),$(".procuretbl").attr("style","border-collapse: collapse !important")}),(o,s)=>(d(),i(f,null,[n(c(x),{title:"Procurements"}),n(S,null,{breadcrumbs:u(()=>[e("li",M,[n(c(v),{href:o.route("dashboard")},{default:u(()=>[p("Dashboard")]),_:1},8,["href"])]),N]),default:u(()=>[e("div",V,[e("button",{class:"btn btn-dark btn-sm",onClick:s[0]||(s[0]=t=>g("createProcurementModal"))},[B,p(" Create Procurements ")])]),e("div",H,[I,e("div",R,[e("div",T,[e("div",j,[e("table",z,[A,l.procurements.length>0?(d(),i("tbody",E,[(d(!0),i(f,null,C(l.procurements,(t,b)=>(d(),i("tr",{key:b},[e("td",null,r(b+1),1),e("td",null,r(t.reference),1),e("td",null,r(t.date),1),e("td",null,r(t.invoice),1),e("td",null,r(t.supplier),1),e("td",null,r(t.remarks),1),e("td",null,[h(e("span",q,"Finished",512),[[_,t.status]]),h(e("span",G,"Saved",512),[[_,!t.status]])]),e("td",null,[n(c(v),{class:"btn btn-sm btn-ghost-success ms-auto me-1",href:o.route("procurement.show",t.id)},{default:u(()=>[J]),_:2},1032,["href"]),h(e("button",{class:D(["btn btn-sm btn-ghost-danger ms-auto me-1",{"opacity-25":c(m).processing}]),onClick:U=>k(t.id),disabled:c(m).processing},Q,10,K),[[_,!t.status]])])]))),128))])):P("",!0)])])])])]),n(L,{procurement:l.procurement_data,stocks:l.stocks},null,8,["procurement","stocks"]),n(F)]),_:1})],64))}};export{te as default};
