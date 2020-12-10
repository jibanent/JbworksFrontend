<template>
	<div id="dashboard">
		<page-title-bar></page-title-bar>
		<div class="row align-items-stretch">
			<div class="col-half-lg-block col-md-6 col-lg-6 col-xl-3 grid-b-space">
				<total-revenue></total-revenue>
			</div>
			<div class="col-half-lg-block col-md-6 col-lg-6 col-xl-3 grid-b-space">
				<total-orders></total-orders>
			</div>
			<div class="col-half-lg-block col-md-6 col-lg-6 col-xl-3 grid-b-space">
				<daily-sales></daily-sales>
			</div>
			<div class="col-half-lg-block col-md-6 col-lg-6 col-xl-3 grid-b-space">
				<expences></expences>
			</div>
		</div>
		<div class="row">
			<div class="col-half-lg-block col-md-6 col-lg-6 col-xl-6 grid-b-space">
				<app-card :heading="$t('message.salesReport')" :headingMenu="true" class="overflow-hide">
					 <targets-and-achievements-chart :width="300" :height="166" />
				</app-card>
			</div>
			<div class="col-half-lg-block col-md-6 col-lg-6 col-xl-6 grid-b-space">
			<app-card :heading="$t('message.salesByCompanion')" :headingMenu="true" contentCustomClass="p-0"
				customClasses="companionman-widget overflow-hide">
				<companion></companion>
			</app-card>        
			</div>
		</div>
		<div class="row align-items-stretch">
			<div class="col-half-lg-block col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 grid-b-space">
				<app-card contentCustomClass="mx-auto" appCardClass="h-100 justify-content-between flex-column d-flex"
					:heading="$t('message.trending')" :headingMenu="true"
					customClasses="sales-category-widget overflow-hide h-100" footerClasses="p-0" :enableFooter="true">
					<sales-by-category></sales-by-category>
					<ul slot="footer" class="footer-border border-0">
						<li class="w-25" v-for="(category,index) in salesByCategory" :key="index">
							<h5 class="font-weight-bold mb text-center">{{category.count}}</h5>
							<span class="font-xs">{{category.category}}</span>
						</li>
					</ul>
				</app-card>
			</div>
			<div class="col-full-lg-block col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 grid-b-space">
				<app-card :heading="$t('message.salesByCategory')" :headingMenu="true" contentCustomClass="p-0"
					customClasses="trending-widget overflow-hide">
					<trending></trending>
				</app-card>
			</div>
			<div class="col-half-lg-block col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 grid-b-space">
				<todo-list></todo-list>
			</div>
		</div>
		<div class="row">
			<div class="col-full-lg-block col-sm-12 col-md-12 col-lg-12 grid-b-space">
				<recent-orders></recent-orders>
			</div>
		</div>
	</div>
</template>

<script>

	// widgets
	import TotalRevenue from "Components/Widgets/TotalRevenue";
	import TotalOrders from "Components/Widgets/TotalOrders";
	import DailySales from "Components/Widgets/DailySales";
	import Expences from "Components/Widgets/Expences";
	import SalesReport from "Components/Widgets/SalesReport";
	import UserStats from "Components/Widgets/UserStats";
	import SalesByCategory from "Components/Widgets/SalesByCategory";
	import Trending from "Components/Widgets/Trending";		
	import Companion from "Components/Widgets/Companion";		
	import TodoList from "Components/Widgets/TodoList";
	import BestSeller from "Components/Widgets/BestSeller";
	import RecentOrders from "Components/Widgets/RecentOrders";
	import SalesOverview from "Components/Widgets/SalesOverview";
	//data
	import { salesByCategory } from "Assets/data/salesByCategory.js";	
	import TargetsAndAchievementsChart from 'Components/Charts/TargetsAndAchievementsChart'
	//chartconfig color
	import ChartConfig from 'Constants/ChartConfig';

	export default {
		name: "dashboard",
		data() {
			return {
				ChartConfig,
				salesByCategory
			}
		},
		components: {
			TodoList,
			TotalRevenue,
			TotalOrders,
			DailySales,
			Expences,
			SalesReport,
			SalesByCategory,
			Trending,									
			Companion,									
			BestSeller,
			RecentOrders,
			TargetsAndAchievementsChart,
			SalesOverview
		}
	};
</script>