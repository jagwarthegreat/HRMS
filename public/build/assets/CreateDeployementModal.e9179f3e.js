import{u as v,j as f,o as d,g as i,d as e,f as h,h as a,y as p,b as o,F as u,x as _,v as c,t as n,l as k,n as M}from"./app.17ce0bb9.js";const g={class:"modal fade",id:"createDeployementModal",tabindex:"-1","aria-labelledby":"createDeployementModal","aria-hidden":"true"},D={class:"modal-dialog modal-md"},S={class:"modal-content"},V=["onSubmit"],w=e("div",{class:"modal-header"},[e("h5",{class:"modal-title",id:"createDeployementModal"}," Add Deployment "),e("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),x={class:"modal-body"},F={class:"row g-3"},U={class:"col-12"},B=e("label",{for:"employees",class:"form-label"}," Employees ",-1),C=["value"],E={class:"col-12"},L=e("label",{for:"trans_date",class:"form-label"}," Date ",-1),j={class:"col-12"},T=e("label",{for:"location",class:"form-label"}," Location ",-1),z=["value"],A={class:"col-12"},I=e("label",{for:"department",class:"form-label"},"Department",-1),J=["value"],N={class:"col-12"},O=e("label",{for:"position",class:"form-label"},"Job Title",-1),q=["value"],G={class:"modal-footer"},H=["disabled"],P={__name:"CreateDeployementModal",props:{props:Object},setup(m){const t=v({employees:[],trans_date:"",location:"",department:"",position:""}),b=()=>{t.post(route("deployment.store"),{onSuccess:()=>{t.reset("employees","trans_date","location","department","position"),$("#createDeployementModal").modal("hide")}})};return f(()=>{const y=document.getElementById("employees");y.addEventListener("changed.coreui.multi-select",l=>{const s=l.value;t.employees=s}),new coreui.MultiSelect(y,{multiple:!0,search:!0})}),(y,l)=>(d(),i("div",g,[e("div",D,[e("div",S,[e("form",{onSubmit:h(b,["prevent"])},[w,e("div",x,[e("div",F,[e("div",U,[B,a(e("select",{class:"form-multi-select",id:"employees","onUpdate:modelValue":l[0]||(l[0]=s=>o(t).employees=s)},[(d(!0),i(u,null,_(m.props.employees,(s,r)=>(d(),i("option",{key:r,value:s.id},n(s.firstname+" "+s.lastname),9,C))),128))],512),[[p,o(t).employees]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(t).errors.employees),513),[[c,o(t).errors.employees]])]),e("div",E,[L,a(e("input",{type:"date",class:"form-control",id:"trans_date","onUpdate:modelValue":l[1]||(l[1]=s=>o(t).trans_date=s)},null,512),[[k,o(t).trans_date]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(t).errors.trans_date),513),[[c,o(t).errors.trans_date]])]),e("div",j,[T,a(e("select",{class:"form-select",id:"location","onUpdate:modelValue":l[2]||(l[2]=s=>o(t).location=s)},[(d(!0),i(u,null,_(m.props.locations,(s,r)=>(d(),i("option",{key:r,value:s.id},n(s.title),9,z))),128))],512),[[p,o(t).location]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(t).errors.location),513),[[c,o(t).errors.location]])]),e("div",A,[I,a(e("select",{class:"form-select",id:"department","onUpdate:modelValue":l[3]||(l[3]=s=>o(t).department=s)},[(d(!0),i(u,null,_(m.props.departments,(s,r)=>(d(),i("option",{key:r,value:s.id},n(s.title),9,J))),128))],512),[[p,o(t).department]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(t).errors.department),513),[[c,o(t).errors.department]])]),e("div",N,[O,a(e("select",{class:"form-select",id:"position","onUpdate:modelValue":l[4]||(l[4]=s=>o(t).position=s)},[(d(!0),i(u,null,_(m.props.positions,(s,r)=>(d(),i("option",{key:r,value:s.id},n(s.title),9,q))),128))],512),[[p,o(t).position]]),a(e("div",{class:"invalid-feedback",style:{display:"block"}},n(o(t).errors.position),513),[[c,o(t).errors.position]])])])]),e("div",G,[e("button",{type:"submit",class:M(["btn btn-sm btn-primary",{"opacity-25":o(t).processing}]),disabled:o(t).processing}," Save Changes ",10,H)])],40,V)])])]))}};export{P as default};