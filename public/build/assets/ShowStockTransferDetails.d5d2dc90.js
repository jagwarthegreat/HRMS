import{j as o,o as e,g as s,d as t,F as d,s as c,k as i,t as a}from"./app.ad2c8530.js";const u={class:"card mb-4"},h=t("div",{class:"card-header"},"Stock Transfer Lists",-1),_={class:"card-body"},m={class:"table table-hover transferdttbl"},b=t("thead",null,[t("tr",null,[t("th",null,"#"),t("th",null,"Stock Name"),t("th",null,"Qty"),t("th")])],-1),f={key:0},S={__name:"ShowStockTransferDetails",props:{details:Array},setup(l){return o(()=>{$(".transferdttbl").DataTable(),$(".transferdttbl").attr("style","border-collapse: collapse !important")}),(k,p)=>(e(),s("div",u,[h,t("div",_,[t("table",m,[b,l.details.length>0?(e(),s("tbody",f,[(e(!0),s(d,null,c(l.details,(r,n)=>(e(),s("tr",{key:n},[t("td",null,a(n+1),1),t("td",null,a(r.stock.name),1),t("td",null,a(r.quantity),1)]))),128))])):i("",!0)])])]))}};export{S as default};
