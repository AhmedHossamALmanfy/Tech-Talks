import{d as h,S as M,a as O}from"./js/Caret.hnvbzqgq.js";import{l as j,m as T}from"./js/postSlug.iva7u65b.js";import{i as W}from"./js/isEqual.czpd1uhn.js";import{g as E,y as I,o as _,c as f,C as c,l as N,u as n,G as $,E as C,a as m,t as k,b as R,Y as G,h as U}from"./js/runtime-dom.esm-bundler.h3clfjuw.js";import{c as V,b as z}from"./js/vue-router.eypfdvl5.js";import{e as A,l as H}from"./js/index.nd8elblc.js";import{l as Q}from"./js/index.npoectbv.js";import{P as Y,b as L,G as F,l as J}from"./js/index.jlplx4ex.js";import{_ as K}from"./js/ScoreButton.br7jqlck.js";import{S as X}from"./js/LogoGear.gxsz2m6s.js";import{_ as Z}from"./js/App.fk02nb60.js";import"./js/translations.b896ab1m.js";import{a as tt,_ as q}from"./js/default-i18n.hohxoesu.js";import"./js/_plugin-vue_export-helper.oebm7xum.js";import"./js/metabox.imp54zfh.js";import"./js/cleanForSlug.i05mvw2m.js";import"./js/toString.fflnj7pf.js";import"./js/helpers.cti0cl6i.js";import"./js/_baseTrim.ohbpllmu.js";import"./js/_stringToArray.mpukyt2g.js";import"./js/_baseSet.c1i96bqt.js";import"./js/_baseIsEqual.h4qr0q1d.js";import"./js/_getTag.fj45ivwn.js";/* empty css                */import"./js/LicenseKeyBar.hjx3oj2j.js";import"./js/ScrollTo.ntqtkazp.js";import"./js/params.k8e95b6q.js";import"./js/allowed.oev11igf.js";import"./js/constants.hcfrsngk.js";import"./js/SettingsRow.1l1umqn0.js";import"./js/Row.o0q8mn7y.js";import"./js/Checkbox.fww0datn.js";import"./js/Checkmark.d5kkjaf5.js";import"./js/Tabs.jvzsqe7o.js";import"./js/TruSeoScore.kirz7zix.js";import"./js/ProBadge.ab6jhp8x.js";import"./js/Information.djrr3pec.js";import"./js/Ellipse.mhzh8c2h.js";import"./js/Slide.dop8j51m.js";import"./js/Index.lexckf3q.js";import"./js/MaxCounts.h4dewttr.js";import"./js/Tags.bchklxw9.js";import"./js/debounce.nun852aa.js";import"./js/toNumber.j7ix6obd.js";import"./js/toFinite.m12yy0up.js";import"./js/Tooltip.jx4casvt.js";import"./js/Statistics.l9vto0az.js";import"./js/Plus.e1tf1dpc.js";import"./js/Eye.jbr17b06.js";import"./js/RadioToggle.h9afcyfi.js";import"./js/GoogleSearchPreview.j1gqkkrz.js";import"./js/HtmlTagsEditor.lf2fbwqe.js";import"./js/Editor.fji40euo.js";import"./js/_baseClone.j5qc2kco.js";import"./js/_arrayEach.n8ou32wp.js";import"./js/UnfilteredHtml.d5n2qgzt.js";import"./js/popup.by9shv56.js";import"./js/license.d8rszxb2.js";import"./js/upperFirst.c4ega9c0.js";import"./js/Mobile.livanyta.js";import"./js/vue3-apexcharts.n0h2b4pa.js";import"./js/ConnectCta.dramn71a.js";import"./js/GoogleSearchConsole.gxgbuztl.js";import"./js/Index.h6ka6vtn.js";import"./js/Blur.f3nyx4yc.js";import"./js/Graph.nl8drpov.js";import"./js/numbers.busvl4mt.js";import"./js/WpTable.iid7bkmr.js";import"./js/Table.dpnj7vzp.js";import"./js/RequiredPlans.kyt85n6a.js";import"./js/addons.b0mmvdz0.js";import"./js/PostTypes.pd67gy5m.js";import"./js/External.lyui8nzf.js";import"./js/InternalOutbound.gq4sspcu.js";import"./js/Image.es2mqda0.js";import"./js/FacebookPreview.jawxccqo.js";import"./js/Img.iuunu5c1.js";import"./js/Profile.t9aiulue.js";import"./js/ImageUploader.lcptj1on.js";import"./js/TwitterPreview.vqtawrbw.js";import"./js/Book.f6lktglp.js";import"./js/Settings.cshbxeez.js";import"./js/Build.mjaxpub4.js";import"./js/Redirects.gg0zdho6.js";import"./js/Index.gz5681uw.js";import"./js/JsonValues.g6ep3o3z.js";import"./js/Url.ejc0l7wu.js";import"./js/External.h5te4wqm.js";import"./js/escapeRegExp.745lls71.js";import"./js/Exclamation.f0pmbpi9.js";import"./js/Gear.dx9icaxx.js";import"./js/date.hhdpx3z9.js";import"./js/DatePicker.o51dzq1p.js";import"./js/Calendar.fbofsn3b.js";import"./js/pick.i0imowk1.js";import"./js/Card.m3lmtg1o.js";import"./js/Upsell.niv97kks.js";let P={};const b=()=>{const t={...P},o=j();W(t,o)||(P=o,T())},ot=t=>{b(),t.on("content_change",()=>{h(b,1e3)}),t.$(document).on("ajaxComplete",function(o,e,r){new URLSearchParams(r.data).get("action")==="so_panels_builder_content_json"&&h(b,1e3)})},et={class:"aioseo-site-origin-integration"},it={__name:"Button",setup(t){const o=E(!1),{currentPost:e}=Y(L()),r=()=>{o.value=!o.value,document.body.classList.toggle("aioseo-site-origin-sidebar--active",o.value)};return I(()=>{o.value=document.body.classList.contains("aioseo-site-origin-sidebar--active"),A.on("siteOriginAioseoClosed",()=>{o.value=!1,document.body.classList.remove("aioseo-site-origin-sidebar--active")})}),(s,a)=>(_(),f("div",et,[c(n(K),{score:n(e).seo_score,class:$([o.value?"aioseo-score-button--active":""]),onClick:C(r,["prevent"])},{icon:N(()=>[c(n(X))]),_:1},8,["score","class"])]))}},rt={class:"edit-post-sidebar editor-sidebar aioseo-site-origin-sidebar"},st={class:"aioseo-site-origin-sidebar__header"},nt={class:"aioseo-site-origin-sidebar__header-title"},at={class:"aioseo-site-origin-sidebar__content"},mt={__name:"Sidebar",setup(t){const e={headerTitle:tt(q("%1$s Settings","all-in-one-seo-pack"),"AIOSEO")};return(r,s)=>(_(),f("div",rt,[m("div",st,[m("div",nt,k(e.headerTitle),1),m("div",{class:"aioseo-site-origin-sidebar__header-close",onClick:s[0]||(s[0]=a=>n(A).emit("siteOriginAioseoClosed",!1))},[c(n(M))])]),m("div",at,[c(n(Z))])]))}},ct={class:"aioseo-site-origin-lmd"},pt={__name:"LimitModifiedDate",setup(t){const o="all-in-one-seo-pack",e=E(!1),r=L(),s=()=>{e.value=!e.value},a=()=>{var v;e.value=!1,r.currentPost.limit_modified_date=!0,r.savePostState(),F()&&window.wp.data.dispatch("core/editor").editPost({aioseo_limit_modified_date:r.currentPost.limit_modified_date}),(v=document.querySelector(".live-editor-save"))==null||v.click()},i={option:q("Don't update the modified date",o)};return(v,_t)=>(_(),f("div",ct,[m("button",{class:"aioseo-site-origin-lmd__button button-primary",onClick:C(s,["prevent"])},[c(n(O),{class:$({rotated:e.value})},null,8,["class"])]),e.value?(_(),f("div",{key:0,class:"aioseo-site-origin-lmd__options",onClick:C(a,["prevent"])},k(i.option),1)):R("",!0)]))}};let p=null,l=null,d=null;const g="#so-live-editor-aioseo-button",y="#so-live-editor-aioseo-sidebar",S="#so-live-editor-aioseo-lmd",w=({id:t,component:o,name:e,rootProps:r,data:s})=>{const a=V({history:z(),routes:[{path:"/",component:o}]});let i=G({name:`Standalone/SiteOrigin/${e}`,render:()=>U(o),data:()=>s||{}},r||{});return i=H(i),i=Q(i),i.use(a),a.app=i,J(i),i.mount(t),i},x=t=>{const o=document.createElement("div");return o.id=t.replace("#",""),o.className="aioseo-live-editor-item",o},lt=t=>{t.querySelector(g)||(t.querySelector(".so-builder-toolbar").insertAdjacentElement("beforeend",x(g)),p==null||p.unmount(),p=w({id:g,component:it,name:"Button"})),t.querySelector(y)||(t.querySelector(".so-rows-container").insertAdjacentElement("beforeend",x(y)),l==null||l.unmount(),l=w({id:y,component:mt,name:"Sidebar",data:{tableContext:window.aioseo.currentPost.context,screenContext:"sidebar"}}))},dt=()=>{const t=document.querySelector(".so-sidebar-tools");!t||t.querySelector(S)||(t.insertAdjacentElement("afterbegin",x(S)),d==null||d.unmount(),d=w({id:S,component:pt,name:"LimitModifiedDate",data:{tableContext:window.aioseo.currentPost.context,screenContext:"limitModifiedDate"}}))},ut=t=>{const o=document.querySelector(".siteorigin-panels-builder");!o||o.querySelector(".aioseo-live-editor-item")||(lt(o),t.on("builder_resize",()=>{h(dt,500)}))},D=t=>{ut(t),ot(t)};let B=!1;const{soPanelsBuilderView:u}=window;if(u!==void 0){const t=Array.isArray(u)?u[0]:u;setTimeout(()=>{D(t)}),B=!0}(function(t){B||t(document).on("panels_setup",(o,e)=>{setTimeout(()=>{D(e)})})})(window.jQuery);