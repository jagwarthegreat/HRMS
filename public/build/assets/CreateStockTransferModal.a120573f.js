import{u as k,o as d,g as i,d as e,f as p,h as r,l as f,b as o,v as c,t as l,y as b,F as u,x as _,n as h}from"./app.c4c2e632.js";const y={class:"modal fade",id:"createStockTransferModal",tabindex:"-1","aria-labelledby":"createStockTransferModal","aria-hidden":"true"},S={class:"modal-dialog"},T={class:"modal-content"},g=["onSubmit"],M=e("div",{class:"modal-header"},[e("h5",{class:"modal-title",id:"createStockTransferModal"}," Add Stock Transfer "),e("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),x={class:"modal-body"},F={class:"row g-3"},V={class:"col-12"},w=e("label",{for:"date",class:"form-label"},"Date Transfer",-1),C={class:"col-12"},U=e("label",{for:"from",class:"form-label"},"From",-1),B=["value"],D={class:"col-12"},A=e("label",{for:"to",class:"form-label"},"To",-1),z=["value"],E={class:"col-12"},L=e("label",{for:"remarks",class:"form-label"},"Remarks",-1),N={class:"modal-footer"},R=["disabled"],G={__name:"CreateStockTransferModal",props:{locations:Array},setup(m){const s=k({date:"",from:"",to:"",remarks:""}),v=()=>{s.post(route("stock.transfer.store"),{onSuccess:()=>{location.reload(),$("#createStockTransferModal").modal("hide"),$(".modal-backdrop").remove(),s.reset("from"),s.reset("to"),s.reset("remarks"),s.reset("date")}})};return(j,a)=>(d(),i("div",y,[e("div",S,[e("div",T,[e("form",{onSubmit:p(v,["prevent"])},[M,e("div",x,[e("div",F,[e("div",V,[w,r(e("input",{type:"date",class:"form-control",id:"date","onUpdate:modelValue":a[0]||(a[0]=t=>o(s).date=t)},null,512),[[f,o(s).date]]),r(e("div",{class:"invalid-feedback",style:{display:"block"}},l(o(s).errors.date),513),[[c,o(s).errors.date]])]),e("div",C,[U,r(e("select",{class:"form-select select2",id:"from","onUpdate:modelValue":a[1]||(a[1]=t=>o(s).from=t)},[(d(!0),i(u,null,_(m.locations,(t,n)=>(d(),i("option",{key:n,value:t.id},l(t.title),9,B))),128))],512),[[b,o(s).from]]),r(e("div",{class:"invalid-feedback",style:{display:"block"}},l(o(s).errors.from),513),[[c,o(s).errors.from]])]),e("div",D,[A,r(e("select",{class:"form-select select2",id:"to","onUpdate:modelValue":a[2]||(a[2]=t=>o(s).to=t)},[(d(!0),i(u,null,_(m.locations,(t,n)=>(d(),i("option",{key:n,value:t.id},l(t.title),9,z))),128))],512),[[b,o(s).to]]),r(e("div",{class:"invalid-feedback",style:{display:"block"}},l(o(s).errors.to),513),[[c,o(s).errors.to]])]),e("div",E,[L,r(e("textarea",{class:"form-control",id:"remarks","onUpdate:modelValue":a[3]||(a[3]=t=>o(s).remarks=t)},`\r
                `,512),[[f,o(s).remarks]]),r(e("div",{class:"invalid-feedback",style:{display:"block"}},l(o(s).errors.remarks),513),[[c,o(s).errors.remarks]])])])]),e("div",N,[e("button",{type:"submit",class:h(["btn btn-sm btn-primary",{"opacity-25":o(s).processing}]),disabled:o(s).processing}," Save Changes ",10,R)])],40,g)])])]))}};export{G as default};