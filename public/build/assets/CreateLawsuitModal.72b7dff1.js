import{u as h,j as v,o as d,g as r,d as e,f as y,h as l,y as p,b as t,F as g,x as k,v as i,t as n,l as m,n as w}from"./app.17ce0bb9.js";const M={class:"modal fade",id:"createLawsuitModal",tabindex:"-1","aria-labelledby":"createLawsuitModal","aria-hidden":"true"},C={class:"modal-dialog modal-lg"},S={class:"modal-content"},x=["onSubmit"],L=e("div",{class:"modal-header"},[e("h5",{class:"modal-title",id:"createLawsuitModal"}," Add Lawsuit/Case "),e("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),V={class:"modal-body"},U={class:"row g-3"},B={class:"col-md-4"},E=e("label",{for:"complainant_container",class:"form-label"},"Complainant",-1),F={class:"mb-3",id:"complainant_container"},O={label:"Employees"},D=["value"],N={class:"col-md-4"},R=e("label",{for:"respondent",class:"form-label"},"Respondent",-1),j={class:"col-md-4"},I=e("label",{for:"case_date",class:"form-label"},"Case Date",-1),z={class:"col-8"},A=e("label",{for:"case_name",class:"form-label"},"Case Name",-1),T={class:"col-md-4"},q=e("label",{for:"status",class:"form-label"},"Status",-1),G=e("option",{value:"Ongoing"},"Ongoing",-1),H=e("option",{value:"Resolved"},"Resolved",-1),J=[G,H],K={class:"col-12"},P=e("label",{for:"content",class:"form-label"},"Content",-1),Q=e("textarea",{type:"text",class:"form-control summernote",name:"content"},null,-1),W={class:"modal-footer"},X=["disabled"],Z={__name:"CreateLawsuitModal",props:{props:Object},setup(u){const s=h({complainant:"",respondent:"",case_date:dateNow,case_name:"",status:"Ongoing",content:""}),_=()=>{s.post(route("lawsuit.store"),{onSuccess:()=>{$("#selectinput").prop("checked",!1),b(),$(".summernote").summernote("reset"),s.reset("complainant","respondent","case_date","case_name","status","content"),$("#createLawsuitModal").modal("hide")}})};v(()=>{$(".summernote").summernote({height:300,toolbar:[["style",["style"]],["font",["bold","underline","clear"]],["fontname",["fontname"]],["color",["color"]],["para",["ul","ol","paragraph"]],["table",["table"]],["insert",["link","picture"]]],callbacks:{onChange:function(o,a){s.content=o}}});const c=document.getElementById("complainant_employee");c.addEventListener("changed.coreui.multi-select",o=>{const a=o.value;s.complainant=a}),new coreui.MultiSelect(c,{multiple:!0,search:!0})});function b(){$("#selectinput").is(":checked")?($("#complainant_employee").show(),$("#complainant").hide()):(s.complainant="",$("#complainant_employee").hide(),$("#complainant").show())}return(c,o)=>(d(),r("div",M,[e("div",C,[e("div",S,[e("form",{onSubmit:y(_,["prevent"])},[L,e("div",V,[e("div",U,[e("div",B,[E,e("div",F,[l(e("select",{class:"form-multi-select",id:"complainant_employee","onUpdate:modelValue":o[0]||(o[0]=a=>t(s).complainant=a)},[e("optgroup",O,[(d(!0),r(g,null,k(u.props.employees,(a,f)=>(d(),r("option",{key:f,value:a.firstname+" "+a.lastname},n(a.firstname+" "+a.lastname),9,D))),128))])],512),[[p,t(s).complainant]])]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},n(t(s).errors.complainant),513),[[i,t(s).errors.complainant]])]),e("div",N,[R,l(e("input",{type:"text",class:"form-control",id:"respondent","onUpdate:modelValue":o[1]||(o[1]=a=>t(s).respondent=a)},null,512),[[m,t(s).respondent]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},n(t(s).errors.respondent),513),[[i,t(s).errors.respondent]])]),e("div",j,[I,l(e("input",{type:"date",class:"form-control",id:"case_date","onUpdate:modelValue":o[2]||(o[2]=a=>t(s).case_date=a)},null,512),[[m,t(s).case_date]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},n(t(s).errors.case_date),513),[[i,t(s).errors.case_date]])]),e("div",z,[A,l(e("input",{type:"text",class:"form-control",id:"case_name","onUpdate:modelValue":o[3]||(o[3]=a=>t(s).case_name=a)},null,512),[[m,t(s).case_name]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},n(t(s).errors.case_name),513),[[i,t(s).errors.case_name]])]),e("div",T,[q,l(e("select",{class:"form-select",id:"status","onUpdate:modelValue":o[4]||(o[4]=a=>t(s).status=a)},J,512),[[p,t(s).status]]),l(e("div",{class:"invalid-feedback",style:{display:"block"}},n(t(s).errors.case_date),513),[[i,t(s).errors.case_date]])]),e("div",K,[P,Q,l(e("div",{class:"invalid-feedback",style:{display:"block"}},n(t(s).errors.content),513),[[i,t(s).errors.content]])])])]),e("div",W,[e("button",{type:"submit",class:w(["btn btn-sm btn-primary",{"opacity-25":t(s).processing}]),disabled:t(s).processing}," Save Changes ",10,X)])],40,x)])])]))}};export{Z as default};