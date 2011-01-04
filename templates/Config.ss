<?xml version="1.0" encoding="utf-8"?>
<% control SiteConfig %>
<Piecemaker>
  <Contents>
		<% control PMSlides %>
		<% control PMSlideFile %>
			<% if Extension == flv %>
			    <Video Source="/$FileName" Title="$PMTitle" Width="940" Height="400" Autoplay="true">
			      <Image Source="PieceMaker/contents/flash-preview.png" />
			    </Video>				
			<% end_if %>
			<% if Extension == jpg %>
   				<Image Source="<% control CroppedImage(940,400) %>$URL<% end_control %>" Title="$PMTitle"></Image>				
			<% end_if %>				
			<% if Extension == png %>				
   				<Image Source="<% control CroppedImage(940,400) %>$URL<% end_control %>" Title="$PMTitle"></Image>				
			<% end_if %>				
			<% if Extension == swf %>				
			    <Flash Source="/$FileName" Title="$Parent.PMTitle">
			      <Image Source="PieceMaker/contents/flash-preview.png" />
			    </Flash>
			<% end_if %>
		<% end_control %>		
		<% end_control %>
 		</Contents>

		<Settings ImageWidth="$ImageWidth" ImageHeight="$ImageHeight" LoaderColor="$LoaderColor" InnerSideColor="$InnerSideColor" SideShadowAlpha="$SideShadowAlpha" DropShadowAlpha="$DropShadowAlpha" DropShadowDistance="$DropShadowDistance" DropShadowScale="$DropShadowScale" DropShadowBlurX="$DropShadowBlurX" DropShadowBlurY="$DropShadowBlurY" MenuDistanceX="$MenuDistanceX" MenuDistanceY="$MenuDistanceY" MenuColor1="$MenuColor1" MenuColor2="$MenuColor2" MenuColor3="$MenuColor3" ControlSize="$ControlSize" ControlDistance="$ControlDistance" ControlColor1="$ControlColor1" ControlColor2="$ControlColor2" ControlAlpha="$ControlAlpha" ControlAlphaOver="$ControlAlphaOver" ControlsX="$ControlsX" ControlsY="$ControlsY" ControlsAlign="$ControlsAlign" TooltipHeight="$TooltipHeight" TooltipColor="$TooltipColor" TooltipTextY="$TooltipTextY" TooltipTextStyle="$TooltipTextStyle" TooltipTextColor="$TooltipTextColor" TooltipMarginLeft="$TooltipMarginLeft" TooltipMarginRight="$TooltipMarginRight" TooltipTextSharpness="$TooltipTextSharpness" TooltipTextThickness="$TooltipTextThickness" InfoWidth="$InfoWidth" InfoBackground="$InfoBackground" InfoBackgroundAlpha="$InfoBackgroundAlpha" InfoMargin="$InfoMargin" InfoSharpness="$InfoSharpness" InfoThickness="$InfoThickness" Autoplay="$Autoplay" FieldOfView="$FieldOfView"></Settings>
		
	<Transitions>
		
		<% control PMTransitions %>
			$Pieces
			<Transition Pieces="$Pieces" Time="$Time" Transition="Transition" Delay="$Delay" DepthOffset="$DepthOffset" CubeDistance="$CubeDistance"></Transition>							
		<% end_control %>

	    <Transition Pieces="9" Time="1.2" Transition="easeInOutBack" Delay="0.1" DepthOffset="300" CubeDistance="30"></Transition>
	    <Transition Pieces="15" Time="3" Transition="easeInOutElastic" Delay="0.03" DepthOffset="200" CubeDistance="10"></Transition>
	    <Transition Pieces="5" Time="1.3" Transition="easeInOutCubic" Delay="0.1" DepthOffset="500" CubeDistance="50"></Transition>
	    <Transition Pieces="9" Time="1.25" Transition="easeInOutBack" Delay="0.1" DepthOffset="900" CubeDistance="5"></Transition>

	</Transitions>
</Piecemaker>
<% end_control %>